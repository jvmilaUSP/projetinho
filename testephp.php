<?php
$pythonScript = 'C:\xampp\htdocs\testepython\teste.py';
$command = 'python ' . $pythonScript . ' 2>&1';  // Redireciona stderr para stdout
$result = exec($command, $output, $returnCode);
echo $returnCode;
if ($returnCode !== 0) {
    // O comando Python retornou um código de erro
    echo "Erro ao executar o comando Python. Código de retorno: " . $returnCode . "<br>";
    
    // Exibe a saída do comando Python (mensagens de erro)
    foreach ($output as $line) {
        echo $line . "<br>";
    }
} else {
    // O comando Python foi executado com sucesso
    echo "Comando Python executado com sucesso.<br>";
    
    // Exibe a saída do comando Python (mensagens de sucesso ou outras informações)
    foreach ($output as $line) {
        echo $line . "<br>";
    }
}
?>