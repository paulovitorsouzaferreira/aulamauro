<?php
// Conexão
$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $codigoSQL = "SELECT * FROM `times`";
    $comando = $conexao->prepare($codigoSQL);
    $comando->execute();
    $times = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
} finally {
    $conexao = null;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times Salvos</title>
</head>
<body>
    <h2>Times Salvos</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Pontos</th>
        </tr>
        <?php foreach ($times as $time): ?>
            <tr>
                <td><?php echo htmlspecialchars($time['nome']); ?></td>
                <td><?php echo htmlspecialchars($time['pontos']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="pagfutebol.html">Voltar</a>
</body>
</html>
