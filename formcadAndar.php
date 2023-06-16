<?php
// Verifica se os campos foram enviados
if(isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    



    // Insere os dados no banco de dados
    $sql = "INSERT INTO andar (nome) VALUES ('$nome')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
