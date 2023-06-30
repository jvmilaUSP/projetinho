import mysql.connector
import numpy as np
from datetime import datetime, timedelta
import random

#Estabelecer a conexão com o banco de dados
conexao = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='jalotou'
)

#Criar um cursor para executar as consultas
cursor = conexao.cursor()



#Pegar o vetor dos últimos 5 minutos:
#calcular a data e hora de 5 minutos atrás:
agora = datetime.now()
cinco_minutos_atras = agora - timedelta(minutes=5)

#formatar data e hora para os ultimos 5 minutos:
data_hora_formatada = cinco_minutos_atras.strftime('%Y-%m-%d %H:%M:%S')

#realizar a consulta com o comando pegar_vetor:
pegar_vetor = f"SELECT ruido FROM leitor WHERE horasensor >= '{data_hora_formatada}' and sensor_idsensor=1"
cursor.execute(pegar_vetor)
vetor_consultado = cursor.fetchall() #essa linha só usa quando é uma consulta

#armazenar os dados da consulta em vetor_consultado:
sensor1 = []
for row in vetor_consultado:
  sensor1.append(row)

sensor1_arredondado = [round(valor[0],1) for valor in sensor1]
print(sensor1_arredondado)


#normalizando os dados:
local_vazio = 80  
local_cheio = 400
sensor1_normalizado = []
for tupla in sensor1:
  valor = tupla[0]  # Acessar o primeiro elemento da tupla
  valor_normalizado = 10 * (valor - local_vazio) / (local_cheio - local_vazio)
  sensor1_normalizado.append(valor_normalizado)


sensor1_normalizado_arredondado = [round(valor,1) for valor in sensor1_normalizado]
print(sensor1_normalizado_arredondado)

#modelo 1 - Z Score:
#definimos os valores extremos que serão descartados
z_number = 0.8
sensor1_z = []

out = []
mean_sensor1 = np.mean(sensor1_normalizado)
std_sensor1 = np.std(sensor1_normalizado)

for valor in sensor1_normalizado:
  out.append((valor - mean_sensor1) / std_sensor1)


for i in range(len(out)):
  if(out[i]>-z_number and out[i]<z_number):
    sensor1_z.append(sensor1_normalizado[i])



#MODELO 2 - MÉTODO DE TUKEY:
q3 = np.quantile(sensor1_normalizado,.75)
q1 = np.quantile(sensor1_normalizado,.25)

iqr = q3-q1

lim_inf = q1 - 0.5*iqr  #1.4 é o parametro arbitrário
lim_sup = q3 + 0.5*iqr

sensor1_tukey = []

for valor in sensor1_normalizado:
  if((valor>lim_inf) and (valor<lim_sup)):
    sensor1_tukey.append(valor)



#MODELO 3 - DESVIO ABSOLUTO MEDIANO
out = []
median_sensor1 = np.median(sensor1_normalizado)
std_sensor1 = np.std(sensor1_normalizado)

for valor in sensor1_normalizado:
  out.append((valor - median_sensor1) / np.abs(std_sensor1))


sensor1_med = []

par_arb = 0.5 #parametro arbitrario

for i in range(len(out)):
  if(out[i]>-par_arb and out[i]<par_arb):
    sensor1_med.append(sensor1_normalizado[i])



#Por enquanto, vou fazer a média dos 3 modelos:
indice_py = (np.mean(sensor1_z) + np.mean(sensor1_med) + np.mean(sensor1_tukey))  /3

print('modelo 1: '+str(round(np.mean(sensor1_z),1)))
print('modelo 2: '+str(round(np.mean(sensor1_tukey),1)))
print('modelo 3: '+str(round(np.mean(sensor1_med),1)))
print(round(indice_py,1))

#Devolver o indice no banco de dados:
devolver_indice = f'UPDATE setor SET indice = {indice_py} WHERE idsetor=1'
cursor.execute(devolver_indice)
conexao.commit() #essa linha só precisa quando edita o banco de dados

#Apagar os dados de antes de 5min:
apagar_vetor = f"DELETE FROM leitor WHERE horasensor < '{data_hora_formatada}' and sensor_idsensor=1"
cursor.execute(apagar_vetor)
conexao.commit()

#Fechar a conexão e o cursor
cursor.close()
conexao.close()


