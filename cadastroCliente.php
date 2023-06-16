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
    <title>Cadastro de Cliente</title>
    
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
                  <div class="navEsquerda" ><div class="buscaGeral"><form action="formcadcliente.php" method="POST" name="buscaShopping" enctype="multipart/form-data"> <input type="search" id="buscaGeral" name="buscaGeral" class="inputBuscaGeral" placeholder="Buscar shopping..."/> </form> </div>
                  <a class="home" href="menuPrincipal.php">Sair</a></div>
                </div>
              </div>
        
     

                               
    <div id="cad" >
        
            <h1>Cadastro de Cliente</h1>
            <fieldset>
              
            </fieldset>
              <form method="POST" name="cadCliente" enctype="multipart/form-data" >
              <div  class="formulario">
                
                <div class="formLinha"><label for="nome"  >Nome: </label><input type="text" name="nome" required id="nome" size=90></div>  <!-- NOME DO SERVIÇO  E SEU INPUT -->
                <div class="formLinha"><label for="cpf">CPF*</label><input id="cpf" type="text" name="cpf"  required=""  size=20 maxlength="14" pattern="\d{3}.\d{3}.\d{3}-\d{2}"   size=50></div>
                <div class="formLinha"><label for="login"  >Login: </label><input type="text" name="login" required id="login" size=45></div> 
                <div class="formLinha"><label for="senha"  >Senha: </label><input type="password" name="senha" required id="senha" size=45></div> 
                <div class="formLinha"><label for="tel">Telefone:</label><input type="tel" name="tel" size="30" maxlength="15" required id="tel" size=50></div>       
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

?>