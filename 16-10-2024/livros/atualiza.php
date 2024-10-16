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
$banco = 'bibleoteca';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$idioma = $_POST['idioma'];
$qtd_pag = $_POST['qtd_pag'];
$editora = $_POST['editora'];
$data_pub = $_POST['data_pub'];
$ISBN = $_POST['ISBN'];

$codigoSQL = "UPDATE `livro` SET `titulo` = :titulo, `idioma` = :idioma, `qtd_pag` = :qtd_pag, `editora` = :editora, `data_pub` = :data_pub, `ISBN` = :ISBN WHERE `id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);
    $comando->bindParam(':titulo', $titulo);
    $comando->bindParam(':idioma', $idioma);
    $comando->bindParam(':qtd_pag', $qtd_pag);
    $comando->bindParam(':editora', $editora);
    $comando->bindParam(':data_pub', $data_pub);
    $comando->bindParam(':ISBN', $ISBN);
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
