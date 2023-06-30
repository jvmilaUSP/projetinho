<?php
// Verifica se a requisição é do ESP32
// Dados recebidos do ESP32
$valor1 = $_POST['valor1'];
$data = $_POST['datahora'];
$idsensor= $_POST['idsensor'];

// Conectar ao banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'jalotou';

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}



// Inserir os dados no banco de dados
$query = "INSERT INTO `leitor`(`ruido`, `horasensor`, `sensor_idsensor`) VALUES ('$valor1','$data','$idsensor')";

$resultado = mysqli_query($conexao, $query);

if ($resultado) {
    echo 'Dados inseridos com sucesso!';
} else {
    echo 'Erro ao inserir dados: ' . mysqli_error($conexao);
}

mysqli_close($conexao);
?>