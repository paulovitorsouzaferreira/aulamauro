<?php

// conexao
$servidor = 'localhost';
$banco = 'livro';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);





$codigoSQL = "INSERT INTO `livro` (`id`, `titulo`, `idioma`, `qtd_pag`, `editora`, `data_pub`, `isbn`) 
VALUES (NULL, :titulo, :idioma, :pag, :editora, :publicacao, :isbn)";

    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('titulo' => $_GET['titulo'], 'idioma' => $_GET['idioma'],'pag' => $_GET['qtd_pag'],
    'editora' => $_GET['editora'], 'publicacao' => $_GET['dataPub'], 'isbn' => $_GET['isbn']));
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$comandoSQL = 'SELECT * FROM `livro`';

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    
    while($linha = $comando->fetch()) {
	echo $linha['titulo'];
    echo "   ";
    echo $linha['idioma'];
    echo "   ";
    echo $linha['qtd_pag'];
    echo "   ";
    echo $linha['editora'];
    echo "   ";
    echo $linha['data_pub'];
    echo "   ";
    echo $linha['ISBN'];
    echo "   ";
	$id = $linha['id'];
    echo "   ";
	echo "<a href='apagalivro.php?id=$id'>Apagar</a><br>";
    }
} else {
    echo "Erro no comando SQL";
}

$conexao = null;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times Salvos</title>
</head>
<body>
<br>
<a href="paglivro.html">Voltar</a>
</body>
</html>