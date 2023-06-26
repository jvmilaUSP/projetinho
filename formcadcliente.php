<?php
// Verifica se os campos foram enviados
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "bd"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['nome']) && isset($_POST['cpf'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tel   = $_POST['tel'];

    $errocpf = 0;
    $errologin = 0;
    $sql = "SELECT cpf, login FROM usuario WHERE cpf = '$cpf' OR login = '$login'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['cpf'] == $cpf) {
                $errocpf = 1;
                break;
            }
            if ($row['login'] == $login) {
                $errologin = 1;
                break;
            }
        }
        
                         
    }
    

    
    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuario (nome, cpf, login, senha, tel) VALUES ('$nome', '$cpf', '$login', $senha, '$tel')";
    
    if (mysqli_query($conn, $sql) && $errocpf == 0 && $errologin == 0) {
        echo "Dados inseridos com sucesso!";
    } else if ($errocpf == 1) {
        echo "Erro ao inserir dados: CPF já existente " . mysqli_error($conn);
    }
    else if ($errologin == 1) {
        echo "Erro ao inserir dados: Login já existente " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
