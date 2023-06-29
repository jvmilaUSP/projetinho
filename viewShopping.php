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
    <title>Estabelecimentos</title>
   
    <link rel="stylesheet" href="NavCss.css" type="text/css">
    <link rel="stylesheet" href="restaurante.css" type="text/css">
    <link rel="stylesheet" href="lista.css" type="text/css">
    <link rel="stylesheet" href="NavJs.Js" type="text/js">
    <link rel="stylesheet" href="viewShopping.js" type="text/js">
    <link rel="icon" href="jalotou.jpg" type="image/x-icon">
    
    <script src="NavJs.Js"></script>
    

</head>
<body>

    <div id="tudo">
      <div id="esq" >    <!-- div esquerda so pra manter o bagulho alinhado  -->   
      </div>  
      <div id="meio" > 
        <div id="conteudoTotal"> 
        
        <!-- Estrutura da Nav -->

        <div class="nav"> <!-- Conteiner da Nav -->
          <!-- BANNER PRINCIPAL-->
            <div id="banner" class="banner">
              <img src="jalotou.jpg"  height="100%"  >
            </div>          
            <div id="navPrincipal" class="navP"> <!-- Barra Ativa-->
              <a class="home" href="viewShopping.php">Home</a> <!-- Botão Home Permanente-->
              <div class="navEsquerda" ><div class="buscaGeral"><form method="POST" name="buscaShopping" enctype="multipart/form-data"> <input type="search" id="buscaGeral" name="buscaGeral" class="inputBuscaGeral" placeholder="Buscar shopping..."/> </form> </div>
              <a class="home" href="menuPrincipal.php">Sair</a></div>
            </div>
          </div>
        
        <!-- /Estrutura da Nav -->

    <div id="cad" class="cad">
        
            <div class="tituloPag"><h1>Estabelecimentos</h1>  </div>
   
            <fieldset>
              
                   <div class="divBuscaLinha">  
                    
                           
                        <div class="divBusca">
                            
                            <input type="search" id="txtBusca" name="txtBusca" class="inputBusca" placeholder="Buscar..."/>
                            <i style="padding-top:10px; padding-right:4px;" class="fas fa-search"></i>
                        </div>  <br>

                    </div>

                    <!-- <div class="subtitulo">
                      <h3>Exibindo pesquisa para "Shopping teste"</h3> 
                      <h5>Para limpar a seleção, clique no botão de limpar.</h5>
                      
                    </div> -->

                    
            


                    
                       <br>
                       <div id="1andar" class="shoppingDivPrincipal"> 
                        
                       
                       <fieldset> 
                        <?php 
                      $sql = "SELECT * FROM estabelecimento";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<div class='blocoShopping'>";
                          echo '<h1 class="restaurante"><a class="titleRestaurante" href="index.php?id=' . $row['idestabelecimento'] . '">' . $row['nome'] . '</a></h1>';
                          echo '<div class="divdesc"><p>' . $row['endereco'] . '</p></div>';
                          echo "</div>";
                      }
                      

                        ?>
                       
                      </fieldset> </div>

                      
            
            
        
          
        
            


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

    <script src="viewShopping.js"></script>

    
</body>



  
  
  
</html>