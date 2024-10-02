<?php

// conexao
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";
echo "Recebido: <br>";
echo $_GET['nome'];
echo "<br>";
echo $_GET['quantidade'];

$codigoSQL = "INSERT INTO `ingredientes` (`id`, `nome`, `quantidade`) VALUES (NULL, :nome, :quantidade)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nome' => $_GET['nome'], 'quantidade' => $_GET['quantidade']));

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