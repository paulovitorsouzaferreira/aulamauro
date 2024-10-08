<?php
// Conexão
$servidor = 'localhost';
$banco = 'livro';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $codigoSQL = "SELECT * FROM `livro`";
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
    <h2>Livros Salvos</h2>
    <table border="1">
        <tr>
            <th>título</th>
            <th>idioma</th>
            <th>quantidade de páginas</th>
            <th>editora</th>
            <th>data da publicação</th>
            <th>ISBN</th>
        </tr>
        <?php foreach ($times as $time): ?>
            <tr>
                <td><?php echo htmlspecialchars($time['titulo']); ?></td>
                <td><?php echo htmlspecialchars($time['idioma']); ?></td>
                <td><?php echo htmlspecialchars($time['qtd_pag']); ?></td>
                <td><?php echo htmlspecialchars($time['editora']); ?></td>
                <td><?php echo htmlspecialchars($time['data_pub']); ?></td>
                <td><?php echo htmlspecialchars($time['ISBN']); ?></td>
                
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="paglivro.html">Voltar</a>
</body>
</html>
