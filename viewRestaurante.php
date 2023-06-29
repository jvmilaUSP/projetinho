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
$idrestaurante = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head >
    <script src="https://kit.fontawesome.com/8fa71b5a9e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição</title>
  
    <link rel="stylesheet" href="NavCss.css" type="text/css">
    <link rel="stylesheet" href="restaurante.css" type="text/css">
    <link rel="stylesheet" href="lista.css" type="text/css">
    <link rel="stylesheet" href="NavJs.Js" type="text/js">
    <link rel="stylesheet" href="lista.Js" type="text/js">
    <link rel="icon" href="jalotou.jpg" type="image/x-icon">
    
    <script src="NavJs.Js"></script>
    
    <style> 
    .red {
      color: rgb(169, 0, 0);
    }
  
    .yellow {
      color: rgb(235, 235, 0);
    }
  
    .green {
      color: rgb(0, 102, 0);
    }

    
    
    </style>
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
              <a class="home" href="menuPrincipal.php" >Sair</a></div>
            </div>
          </div>
        
        

    <div id="cad" class="cad">
    <?php 
                      $sql = "SELECT * FROM setor WHERE idsetor = $idrestaurante";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='tituloPag'><h1>".$row['nome']."</h1>  </div>";
                    }
                      ?>
        
            <!-- <div class="tituloPag"><h1>Outback</h1>  </div> -->
            <fieldset>
                    

                    <div class="descricaorestaurante">
                    <?php 
                      $sql = "SELECT * FROM setor WHERE idsetor = $idrestaurante";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<h4>Palavras chave: ".$row["palavrachave"] ."</h4>";
                        echo "<p>Descricao: ".$row["descricao"] ."</p>";
                        echo "<button href='". $row['link'].">Acessar Menu</button>";

                    }
                      ?>
                     <!--    <h4>Palavras chave: Comida australiana, churrasco</h4>
                        <p>Descrição: Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis corrupti aliquam possimus debitis? Ad dolore fuga iste laboriosam quam similique?</p>
                     <br>   <p>Horário de funcionamento: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, similique?</p> <br> 
                     <button>Acessar Menu</button> -->
                    </div>

                    
                    

              
            </fieldset>

        </div>
        
        <div id="espaco"> </div>
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

    
</body>



  
  
  
</html>