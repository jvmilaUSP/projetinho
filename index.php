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
    <title>Menu</title>
 
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
              <a class="home" href="menuPrincipal.php">Home</a> <!-- Botão Home Permanente-->
              <div class="navEsquerda" ><div class="buscaGeral"><form method="POST" name="buscaShopping" enctype="multipart/form-data"> <input type="search" id="buscaGeral" name="buscaGeral" class="inputBuscaGeral" placeholder="Buscar shopping..."/> </form> </div>
              <a class="home" href="menuPrincipal.php">Sair</a></div>
            </div>
          </div>
        
        <!-- /Estrutura da Nav -->

    <div id="cad" class="cad">
        
            <div class="tituloPag"><h1>Shopping Butantã - restaurantes</h1>  </div>
            
              
              
              
            
            <fieldset>
              
              
                   

                   <div class="divBuscaLinha">  
                    <select id="andarSelect" name="andarSelect" class="select" > 
                      <option value="0">Selecione o andar</option>
                      <option value="1andar">1 Andar</option>
                      <option value="2andar">2 Andar</option>
                      <option value="3andar">3 Andar</option>
                  </select>
                           
                        <div class="divBusca">
                            <input type="search" id="txtBusca" name="txtBusca" class="inputBusca" placeholder="Buscar..."/>
                            <i style="padding-top:10px; padding-right:4px;" class="fas fa-search"></i>
                        </div>  <br>

                    </div>

                    <div class="subtitulo">
                      <h3>Última atualização: 19:31</h3> 
                      <h5>O sistema atualiza a cada 5 minutos.</h5>
                      <h5>Este número a direita de cada estabelecimento é o índice de lotação que varia de 0 a 10, quanto maior, mais lotado.</h5>

                    </div>

                    
                    


                    
                       <br>
                       <div id="1andar" class="andar"> 
                       <h2>1 Andar</h2> 
                       <fieldset> 
                        
                       <div class="blocorestaurante">
                        <h1 class="restaurante"  > <a href="viewRestaurante.html" class="titleRestaurante" >Outback </a>  </h1>
                        <h1 class="indice numero" >5.4</h1>
                        <div class="divdesc"><p>Comida Australiana, churrasco</p>  </div>
                         
                        <div class="divmenu"><a href="" >Cardápio Digital</a></div>
                        
                        
                        </div>
                        <div class="blocorestaurante">
                          <h1 class="restaurante">McDonalds</h1>
                          <h1 class="indice numero" >7.4</h1>
                          <div class="divdesc"><p>Fast-food</p>  </div>
                           
                          <div class="divmenu"><a>Cardápio Digital</a></div>
                          
                          
                          </div>
                          <div class="blocorestaurante">
                            <h1 class="restaurante">Bacio de Lattee</h1>
                            <h1 class="indice numero" >9.4</h1>
                            <div class="divdesc"><p>Sorvetes</p>  </div>
                             
                            <div class="divmenu"><a>Cardápio Digital</a></div>
                            
                            
                            </div>
                      </fieldset> </div>

                      <!--  2 ANDAR-->
                      <div id="2andar" class="andar"> 
                      <div class="inp"><h2>2 Andar</h2> </div>
                       <fieldset> 
                        
                       <div class="blocorestaurante">
                        <h1 class="restaurante">Almanara</h1>
                        <h1 class="indice numero" >6.4</h1>
                        <div class="divdesc"><p>Comida Indiana</p>  </div>
                         
                        <div class="divmenu"><a>Cardápio Digital</a></div>
                        
                        
                        </div>
                        <div class="blocorestaurante">
                          <h1 class="restaurante">Bar Maneiro</h1>
                          <h1 class="indice numero" >1.4</h1>
                          <div class="divdesc"><p>Porções</p>  </div>
                           
                          <div class="divmenu"><a>Cardápio Digital</a></div>
                          
                          
                          </div>
                          <div class="blocorestaurante">
                            <h1 class="restaurante">Bar do Moe</h1>
                            <h1 class="indice numero" >9</h1>
                            <div class="divdesc"><p>Cerveja</p>  </div>
                             
                            <div class="divmenu"><a>Cardápio Digital</a></div>
                            
                            
                            </div>
                      </fieldset> </div>
                      
            
            

                  <br>

              
            </fieldset>
            <fieldset>
             
              
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

    
</body>



  
  
  
</html>