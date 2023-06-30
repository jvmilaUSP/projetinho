<?php
// Verifica se os campos foram enviados
session_start();
$id = $_GET['idandar'];
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "jalotou"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);

    



    // Insere os dados no banco de dados
    $id = $_GET['id'];
    $sql = "DELETE FROM andar WHERE idandar = $id";
    mysqli_query($conn, $sql);
    $idestabelecimento = $_SESSION['id'];

    // Verifica se a exclusão foi bem-sucedida e redireciona para uma página de confirmação
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: viewAndar.php");
        exit;
    }

// Fecha a conexão com o banco de dados
mysqli_close($conn);

?>