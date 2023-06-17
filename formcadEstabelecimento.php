<?php
// Verifica se os campos foram enviados
if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['endereco']) && isset($_POST['cnpj']) && isset($_POST['tel'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $cnpj = $_POST['cnpj'];
    $tel   = $_POST['tel'];


    
    // Insere os dados no banco de dados
    $sql = "INSERT INTO estabelecimento (nome, cpf, endereco, cnpj, tel) VALUES ('$nome', '$cpf', '$endereco', $cnpj, '$tel')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
