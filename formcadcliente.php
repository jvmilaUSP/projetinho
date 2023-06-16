<?php
// Verifica se os campos foram enviados
if(isset($_POST['nome']) && isset($_POST['cpf'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tel   = $_POST['tel'];



    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuario (nome, cpf, login, senha, tel) VALUES ('$nome', '$cpf', '$login', $senha, '$tel')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
