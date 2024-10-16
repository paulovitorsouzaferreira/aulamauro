<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza dados</title>
</head>
<body>
<?php

$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}


$id = $_POST['id'];
$nome = $_POST['nome'];
$pontos = $_POST['pontos'];

$codigoSQL = "UPDATE `times` SET `nome` = :nome, `pontos` = :pontos WHERE `id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);
    $comando->bindParam(':nome', $nome);
    $comando->bindParam(':pontos', $pontos);
    $comando->bindParam(':id', $id, PDO::PARAM_INT);
    
    $comando->execute();

    if ($comando->rowCount() > 0) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Nenhuma alteração foi feita.";
    }
} catch (Exception $e) {
    echo "Erro: " . htmlspecialchars($e->getMessage());
}

$conexao = null;
?>

<form action="index.php">
        <button type="submit" class="btn">Voltar para Pagina Principal</button>
    </form>
</body>
</html>
