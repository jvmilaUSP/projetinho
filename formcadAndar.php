<?php
// Verifica se os campos foram enviados
session_start();
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "jalotou"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['nome'])) {
    $nome = $_POST['nome'];


    



    // Insere os dados no banco de dados
    $id = $_SESSION['id'];
    $sql = "INSERT INTO andar (nome, estabelecimento_idestabelecimento) VALUES ('$nome', '$id')";
        
    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
