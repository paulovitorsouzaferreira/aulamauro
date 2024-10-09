<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apaga item</title>
</head>
<body>
<?php
    $id = $_GET['id'];
    $comandoSQL = "DELETE FROM times WHERE `times`.`id` = $id";

    $servidor = 'localhost';
    $banco = 'futebol';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    try {
	$resultado = $conexao->exec($comandoSQL);

	if($resultado != 0) {
	    echo "Item apagado!";
	} else {
	    echo "Erro ao apagar o item!";
	}
    } catch (Exception $e) {
	echo "Erro $e";
    }
?>
</body>
</html>  


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times Salvos</title>
</head>
<body>
    <br>
<a href="pagfutebol.html">Voltar</a>
</body>
</html>