<?php

// conexao
$servidor = 'localhost';
$banco = 'loja';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['nome'];
echo "<br>";
echo $_GET['descricao'];
echo "<br>";
echo $_GET['preco'];
echo "<br>";
echo $_GET['url'];



$codigoSQL = "INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `url` ) VALUES (NULL, :nm, :dc, :pc, :ul)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'dc' => $_GET['descricao'],'pc' => $_GET['preco'],'ul' => $_GET['url']));

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
