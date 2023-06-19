<?php
// Verifica se os campos foram enviados
if(1 == 1) {
    $nome = $_POST['nomeRestaurante'];
    $andar = $_POST['andarSelect'];
    $palavrachave = $_POST['palavrachaveSelect'];
    $descricao = $_POST['descricao'];
    $link = $_POST['linkcardapio'];
  





    
    // Insere os dados no banco de dados
    $sql = "INSERT INTO setor (nome, andar_idandar, descricao, link) VALUES ('$nome', '$andar', '$descricao', $link)";
    
    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso!";
        $ultimoID = mysqli_insert_id($conn);
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}


    
if(isset($_POST['hiddendiaSemana'])) {
    $diasemanas = $_POST['hiddendiaSemana'];
    $horarioInicio = $_POST['hiddenHorarioInicio'];
    $horarioFim = $_POST['hiddenHorarioFim'];

    // Usando um loop foreach
$resultado = array_map(null, $diasemanas, $horarioInicio,$horarioFim);

foreach ($resultado as [$dia, $inicio, $fim]) {
    $sql = "INSERT INTO horario (horainicial, horafinal, dia, idsetor) VALUES ('$inicio', '$fim', '$dia', $ultimoID)";
}

}
mysqli_close($conn);
?>

