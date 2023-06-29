<?php
// Verifica se os campos foram enviados
$servername = "localhost"; // nome do servidor (geralmente localhost)
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "bd"; // nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['endereco']) && isset($_POST['cnpj']) && isset($_POST['tel'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $cnpj = $_POST['cnpj'];
    $tel   = $_POST['tel'];

    // Busca o idusuario com base no cpf
    $sqlBusca = "SELECT idusuario FROM usuario WHERE cpf = '$cpf'";
    $resultadoBusca = mysqli_query($conn, $sqlBusca);

    if (mysqli_num_rows($resultadoBusca) > 0) {
        $row = mysqli_fetch_assoc($resultadoBusca);
        $idusuario = $row['idusuario'];

        // Insere os dados no banco de dados
        $sql = "INSERT INTO estabelecimento (idestabelecimento, nome, estabelecimento_idestabelecimento, endereco, cnpj, tel) VALUES ('$idusuario','$nome', $idusuario, '$endereco', '$cnpj', '$tel')";

        if (mysqli_query($conn, $sql)) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conn);
        }
    } else {
        echo "Usuário não encontrado com o CPF informado.";
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
