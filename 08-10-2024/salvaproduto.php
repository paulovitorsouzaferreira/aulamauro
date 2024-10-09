<?php

// conexao
$servidor = 'localhost';
$banco = 'produtos';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    echo $_GET['nome'];
    echo $_GET['url_foto'];
    echo $_GET['descricao'];
    echo $_GET['preco'];
    

$codigoSQL = "INSERT INTO `produtos` (`id`, `nome`, `pontos`) VALUES (NULL, :nome, :pontos)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array(
            'nome' => $nome,
            'url_foto' => $url_foto,
            'descricao' => $descricao,
            'preco' => $preco
        ));

    if($resultado) {
	echo "";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Salvos</title>
</head>
<body>
    <br>
<a href="pagproduto.html">Voltar</a>
</body>
</html>