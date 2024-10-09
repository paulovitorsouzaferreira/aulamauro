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
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "SELECT * FROM `livro`";

try {
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute();

    if($resultado) {
	echo "Mostrando valores";
    while($linha = $comando->fetch()){
        echo "<p>titulo: " . $linha['titulo'] . "</p><br>";
        echo "<p> idioma: " . $linha['idioma'] . "</p> <br>";
        echo "<p> quantidade de paginas: " . $linha['qtd_pag'] . "</p> <br>";
        echo "<p> editora: " . $linha['editora'] . "</p> <br>";
        echo "<p> data de publicacao: " . $linha['data_pub'] . "</p> <br>";
        echo "<p> ISBN: " . $linha['ISBN'] . "</p> <br>";
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
