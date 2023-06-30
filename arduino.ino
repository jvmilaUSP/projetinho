#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

const char* ssid = "AndroidAPA7EA";
const char* password = "jask8895";
const char* serverURL = "http://192.168.30.96:80/testepython/sensor.php";

const int janeladeamostra = 5000;
unsigned int amostra;

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  pinMode(32,INPUT);
}
void loop() {
  unsigned long iniciaMs = millis();
  unsigned int PicoaPico = 0;
  unsigned int sinalMax = 0;
  unsigned int sinalMin = 1024;
  unsigned int qntd = 0;
  unsigned int soma = 0;

  while (millis() - iniciaMs < janeladeamostra) {
    amostra = analogRead(32);
    if(amostra>0 && amostra<1024){
    soma+=amostra;
    qntd++;
    }
  }
  double volts = soma/qntd;

  Serial.println(volts);

  // Obter a data e hora atual da API do WorldTime
  WiFiClient client;
  HTTPClient http;

  if (http.begin(client, "http://worldtimeapi.org/api/timezone/America/Sao_Paulo")) {
    int httpResponseCode = http.GET();

    if (httpResponseCode == HTTP_CODE_OK) {
      String payload = http.getString();

      // Parse do JSON recebido
      DynamicJsonDocument jsonDoc(1024);
      DeserializationError error = deserializeJson(jsonDoc, payload);

      if (!error) {
        // Extrair a data e hora do JSON
        const char* dateTime = jsonDoc["datetime"];
        String dateTimeString(dateTime);

        // Formatar a data e hora no formato correto
        String datahora = dateTimeString.substring(0, 19);

        // Enviar os dados para o servidor PHP
        if (http.begin(client, serverURL)) {
          http.addHeader("Content-Type", "application/x-www-form-urlencoded");
          String postData = "valor1=" + String(volts) + "&datahora=" + datahora + "&idsensor=1";

          int httpResponseCode = http.POST(postData);

          if (httpResponseCode > 0) {
            String response = http.getString();
            Serial.println("Resposta do servidor: " + response);
          } else {
            Serial.println("Erro na requisição. Código de erro: " + String(httpResponseCode));
          }

          http.end();
        } else {
          Serial.println("Não foi possível se conectar ao servidor");
        }
      } else {
        Serial.println("Erro ao fazer parse do JSON");
      }
    } else {
      Serial.println("Erro na requisição para a API do WorldTime");
    }

    http.end();
  } else {
    Serial.println("Não foi possível se conectar à API do WorldTime");
  }
}