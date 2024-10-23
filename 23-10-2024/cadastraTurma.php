<?php

$servidor = 'localhost';
$banco = 'sistema_notas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);


$codigoSQL = "INSERT INTO `turmas2` (`id`, `nome`) VALUES (NULL, ''), (NULL, '{$_GET['turma']}')";

try {
    $resultado = $conexao->exec($codigoSQL);

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
