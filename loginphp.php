<?php
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
        
    }

}
if ($existelogin == 0){
    echo "Usuário não encontrado. Por favor, verifique suas credenciais.";
    header("Location: login.php"); // Redireciona para a página de login
    exit(); // Encerra a execução do script
}
    
?>