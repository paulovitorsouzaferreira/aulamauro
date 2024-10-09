<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostra dados</title>
</head>
<?php

// conexao
$servidor = 'localhost';
$banco = 'loja';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "SELECT * FROM `produto`";

try {
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute();

    if($resultado) {
	echo "Mostrando valores";
    while($linha = $comando->fetch()){
        echo "<p>nome: " . $linha['nome'] . "</p><br>";
        echo "<p> descricao: " . $linha['descricao'] . "</p> <br>";
        echo "<p> preco: " . $linha['preco'] . "</p> <br>";
        echo "<p> url: " . $linha['url'] . "</p> <br>";
        $id = $linha['id'];
        echo "<a href='deleta.php?id=$id'>apagar elemento</a><br>";
    }
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>
<body>
    <form action="deleta.php">
        <p>Informe id do item que quer que seja apagado</p>
        <label for="id">id:</label>
	    <input type="text" name="id"><br>
        <input type="submit">
    </form>
</body>

</html>

