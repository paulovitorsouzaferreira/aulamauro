<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleta dados</title>
</head>
<?php
// conexao
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo $_GET['id'];
$id = $_GET['id'];

$codigoSQL = "DELETE FROM livro WHERE `livro`.`id` = $id";

try {
    $comando = $conexao->exec($codigoSQL);
    
    if($comando != 0) {
	echo "Comando executado";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>
</html>
