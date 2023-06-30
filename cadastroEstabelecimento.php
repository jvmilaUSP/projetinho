<?php 
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "jalotou"; // nome do banco de dados

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
    <title>Cadastro de Estabelecimento</title>

    <link rel="stylesheet" href="NavCss.css" type="text/css">
    <link rel="stylesheet" href="restaurante.css" type="text/css">
    <link rel="stylesheet" href="NavJs.Js" type="text/js">
    <link rel="stylesheet" href="lista.js" type="text/js">
    <link rel="stylesheet" href="cpf.js" type="text/js">
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
                  <a class="home" href="navegar.html">Home</a> <!-- Botão Home Permanente-->
                  <div class="navEsquerda" ><div class="buscaGeral"><form method="POST" name="buscaShopping" enctype="multipart/form-data"> <input type="search" id="buscaGeral" name="buscaGeral" class="inputBuscaGeral" placeholder="Buscar shopping..."/> </form> </div>
                  <a class="home" href="menuPrincipal.php">Sair</a></div>
                </div>
              </div>
        
     

                               
    <div id="cad" >
        
            <h1>Cadastro de Estabelecimento</h1>
            <fieldset>
              
            </fieldset>
              <form action="formcadEstabelecimento.php" method="POST" name="cadEstabelecimento" enctype="multipart/form-data" >
              <div  class="formulario">
                  <!-- NOME DO SERVIÇO  E SEU INPUT -->
                <div class="formLinha"><label for="nome"  >Nome: </label><input type="text" name="nome" required id="nome" size=90></div>  <!-- NOME DO SERVIÇO  E SEU INPUT -->
                <div class="formLinha"><label for="cpf">CPF do cliente*:</label><input id="cpf" type="text" name="cpf"  required=""  size=20 maxlength="14" pattern="\d{3}.\d{3}.\d{3}-\d{2}"   size=50></div>
                <div class="formLinha"><label for="endereco"  >Endereço: </label><input type="text" name="endereco" required id="endereco" size=45></div> 
                <div class="formLinha"><label for="cnpj"  >CNPJ: </label><input type="text" name="cnpj" required id="cnpj" size=45></div> 
                <div class="formLinha"><label for="tel">Telefone do estabelecimento*</label><input type="tel" name="tel" size="30" maxlength="15" required id="tel1" size=50></div>       
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

    <div id="dir"  > </div>   
    </div>

   



























    </div>

  

    <script src="cpf.js"></script>
  
    
</body>
</html>