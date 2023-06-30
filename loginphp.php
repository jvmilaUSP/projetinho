<?php
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "jalotou"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);

$login = $_POST['login'];
$existelogin = 0;
$senha = $_POST['senha'];
$sql = "SELECT login, senha FROM adm WHERE login = '$login' and senha = '$senha'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['id'] = $row['idadm'];
    $_SESSION['tipo'] = 'adm';
    $existelogin = 1;
    header("Location: navegar.php"); // Redireciona para a página de login
}

else{
    $sql = "SELECT login, senha FROM usuario WHERE login = '$login' and senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id'] = $row['idusuario'];
        $_SESSION['tipo'] = 'usuario';
        $existelogin = 1;
        header("Location: navegarcliente.php"); // Redireciona para a página de login
        
    }

}
if ($existelogin == 0){
    echo "Usuário não encontrado. Por favor, verifique suas credenciais.";
    header("Location: login.php"); // Redireciona para a página de login
    exit(); // Encerra a execução do script
}
    
?>