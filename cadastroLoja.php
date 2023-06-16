<?php 
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "bd"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head >
    <script src="https://kit.fontawesome.com/8fa71b5a9e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Restaurante</title>
   
    <link rel="stylesheet" href="NavCss.css" type="text/css">
    <link rel="stylesheet" href="restaurante.css" type="text/css">
    <link rel="stylesheet" href="tabela.css" type="text/css">
    <link rel="stylesheet" href="NavJs.Js" type="text/js">
    <link rel="stylesheet" href="lista.js" type="text/js">
    <link rel="stylesheet" href="horario.js" type="text/js">
    <link rel="icon" href="jalotou.jpg" type="image/x-icon">
    <script src="NavJs.Js"></script>
    

</head>
<body>

    <div id="tudo">
        <div id="esq" >    <!-- div esquerda so pra manter o bagulho alinhado  -->   
             </div>  
        <div id="meio" > 
        
            <!-- Estrutura da Nav -->

            <div class="nav"> <!-- Conteiner da Nav -->
              <!-- BANNER PRINCIPAL-->
                <div id="banner" class="banner">
                  <img src="jalotou.jpg"  height="100%"  >
                </div>          
                <div id="navPrincipal" class="navP"> <!-- Barra Ativa-->
                  <a class="home" href="navegarcliente.html">Home</a> <!-- Botão Home Permanente-->
                  <div class="navEsquerda" ><div class="buscaGeral"><form method="POST" name="buscaShopping" enctype="multipart/form-data"> <input type="search" id="buscaGeral" name="buscaGeral" class="inputBuscaGeral" placeholder="Buscar shopping..."/> </form> </div>
                  <a class="home" href="menuPrincipal.php">Sair</a></div>
                </div>
              </div>
        
     

                               
    <div id="cad" >
        
            <h1>Cadastro de Restaurante</h1>
            <fieldset>
              
            </fieldset>
              <form action="formcadLoja.php" method="POST" name="cadLoja" enctype="multipart/form-data" >
              <div  class="formulario">
                <div class="formLinha"><label for="andar"  >Andar: </label><select id="andarSelect" name="andarSelect" class="selectcad" > 
                    <option value="0">Selecione o andar</option>
                    <option value="1andar">1 Andar</option>
                    <option value="2andar">2 Andar</option>
                    <option value="3andar">3 Andar</option>
                </select></div>
                  <!-- NOME DO SERVIÇO  E SEU INPUT -->
                <div class="formLinha"><label for="nomeRestaurante"  >Nome do Restaurante: </label><input type="text" name="nomeRestaurante" required id="nomeRestaurante" size=90></div>  <!-- NOME DO SERVIÇO  E SEU INPUT -->
                <div class="formLinha"><label for="foto">Foto:</label><input id="foto" type="file" name="foto"       ></div>
                <div class="formLinha"><label for="palavrachave"  >Palavras-chave: </label> <select id="palavrachaveSelect" name="palavrachaveSelect" class="selectcad" > 
                  <option value="0">Selecione</option>
                  <option value="pizza">Pizza</option>
                  <option value="hamburguer">hamburguer</option>
                  <option value="cerveja">Cerveja</option>
                  <option value="cafe">Cafeteria</option>
                  <option value="churrasco">Churrasco</option>
                  <option value="italiana">Comida Italiana</option>
                  <option value="japones">Japonês</option>
                  <option value="chines">Chinês</option>
                  <option value="italiano">Italiano</option>
                  <option value="frances">Francês</option>
                  <option value="vegetariano">Vegetariano</option>
                  <option value="vegano">Vegano</option>
                  <option value="indiano">Indiano</option>
                  <option value="sushi">Sushi</option>
                  <option value="bar">Bar</option>
                  <option value="padaria">Padaria</option>
                  <option value="cafeteria">Cafeteria</option>
                  <option value="buffet">Buffet</option>
                  
                  <option value="peixes_frutos_mar">Peixes e Frutos do Mar</option>
              </select> </div>
                <div class="formLinha"><label for="foto">Descrição:</label></div>
                <div class="formLinha"><textarea id="descricao" name="descricao" rows="7" cols="45" ></textarea></div> 
                <div class="formLinha"><label for="linkcardapio"  >Link do Cardápio: </label><input type="text" name="linkcardapio" required id="linkcardapio" size="45"></div> 
                <div class="formLinha"><label for="palavrachave"  >Dia da semana: </label> <select id="diaSemanaSelect" name="diaSemanaSelect" class="selectcad" > 
                  <option value="0">Selecione</option>
                  <option value="seg">Segunda</option>
                  <option value="ter">Terça</option>
                  <option value="qua">Quarta</option>
                  <option value="qui">Quinta</option>
                  <option value="sex">Sexta</option>
                  <option value="sab">Sábado</option>
                  <option value="dom">Domingo</option>
              </select> </div>       
                <div class="formLinha"> <label for="horarioinicio">Horário Abertura: </label>  <input type="time" name="horarioinicio"   required id="horarioinicio" ></div>
                <div class="formLinha"> <label for="horariofim">Horário Fechamento: </label>  <input type="time" name="horariofim"   required id="horariofim" > </div>
                <div class="formLinha"><button type="button" onclick="adicionarHorario()"> Adicionar Horário</button> </div>
                
                <table id="tabelaHorarios" class="tabelaHorarios">
                  <tr> <th class="dia">Dia</th> <th>Horário Abertura </th> <th>Horário Fechamento</th> <th>Excluir</th>  </tr> 
                  <tr>  </tr>
                </table>
                <div class="botoes" >  
                    
                    <button type="submit" href="/">Cadastar </button>
                </div> 
                
            </form>
  
              </div>
           
        </div>
        
        <div class="dFooter">
          <footer class="fFooter">
            
          
          </footer>
        </div>


    </div>
<script src="horario.js"> </script>
    <div id="dir"  > </div>   
    </div>


    </div>

  

  
    
</body>
</html>