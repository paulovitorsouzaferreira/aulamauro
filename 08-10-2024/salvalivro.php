<?php

// conexao
$servidor = 'localhost';
$banco = 'livro';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['titulo'];
echo "<br>";
echo $_GET['idioma'];
echo "<br>";
echo $_GET['qtd_pag'];
echo "<br>";
echo $_GET['editora'];
echo "<br>";
echo $_GET['dataPub'];
echo "<br>";
echo $_GET['isbn'];


$codigoSQL = "INSERT INTO `livro` (`id`, `titulo`, `idioma`, `qtd_pag`, `editora`, `data_pub`, `isbn`) 
VALUES (NULL, :titulo, :idioma, :pag, :editora, :publicacao, :isbn)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('titulo' => $_GET['titulo'], 'idioma' => $_GET['idioma'],'pag' => $_GET['qtd_pag'],
    'editora' => $_GET['editora'], 'publicacao' => $_GET['dataPub'], 'isbn' => $_GET['isbn']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>