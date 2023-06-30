<?php 
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "jalotou"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
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
    <title>Já Lotou?</title>
 
    <link rel="stylesheet" href="NavCss.css" type="text/css">
    <link rel="stylesheet" href="restaurante.css" type="text/css">
    <link rel="stylesheet" href="lista.css" type="text/css">
    <link rel="stylesheet" href="tabela.css" type="text/css">
    <link rel="stylesheet" href="NavJs.Js" type="text/js">
    <link rel="stylesheet" href="lista.Js" type="text/js">
    <link rel="stylesheet" href="buscaTabelaVisualizarLojas.Js" type="text/js">
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
              <a class="home" href="menuPrincipal.php">Home</a> <!-- Botão Home Permanente-->
              <div class="navEsquerda" ><div class="buscaGeral"><form method="POST" name="buscaShopping" enctype="multipart/form-data"> <input type="search" id="buscaGeral" name="buscaGeral" class="inputBuscaGeral" placeholder="Buscar shopping..."/> </form> </div>
              <a class="home" href="menuPrincipal.php">Sair</a></div>
            </div>
          </div>
        
        <!-- /Estrutura da Nav -->

    <div id="cad" class="cad">
        
    <?php 
                    $id = $_SESSION['id'];
                      $sql = "SELECT * FROM estabelecimento WHERE idestabelecimento = $id";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option'>".$row['nome'];
                        echo "<div class='tituloPag'><h1>".$row['nome']." - restaurantes</h1>  </div>"; 
                    
                    }
                    ?>
            
              
              
              
            
            <fieldset>
              
              
                   



                    <div class="tabela" >  
                    <div class="iconeTabela"> <i class="fas fa-plus-square"></i> </div>
                     
                    <table id="tabelaMaiorAndar"class="tabelaMaiorAndar"> 
                        <tr> <th>Andar</th>  <th>Excluir</th>  </tr>
                        <?php 
                            $sql = "SELECT * FROM andar WHERE estabelecimento_idestabelecimento = $id";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr> <td class='tituloAndar'>".$row['nome'] . "</td>  <td class='excluir' href='excluirAndar.php?idandar='".$row['idandar']."'><a href='>X</a></td></tr>";
                            echo "<div class='tituloPag'><h1>".$row['nome']." - restaurantes</h1>  </div>"; 
                    
                    }
                    ?>
                        <tr> <td class="tituloAndar">1 Andar </td>  <td class="excluir">X</td></tr>
                        <tr> <td class="tituloAndar">2 Andar </td>  <td class="excluir">X</td></tr>
                        <tr> <td class="tituloAndar">3 Andar </td>  <td class="excluir">X</td></tr>
                        <tr> <td class="tituloAndar">Subsolo </td>  <td class="excluir"><i class="fas fa-times"  ></i></td></tr>
                    </table>
                </div>

                    

                    
                    


                    
                       
                    

                      <!--  2 ANDAR-->
                      
                      
            
            

                  

              
            </fieldset>
            
            
            
        
          
        
            


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

    <script src="lista.js"></script>
    <script src="buscaTabelaVisualizarLojas.Js"></script>
    
</body>



  
  
  
</html>