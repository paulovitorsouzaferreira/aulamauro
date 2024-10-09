<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando dados</title>
</head>
<body>
    <?php
$servidor = 'localhost';
$banco = 'produtos';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$comandoSQL = 'SELECT * FROM `produtos`';

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:<br>";
    while($linha = $comando->fetch()) {
	echo $linha['nome'];
    echo "   ";
    echo $linha['url_foto'];
    echo "   ";
    echo $linha['descricao'];
    echo "   ";
    echo $linha['preco'];
    echo "   ";
	$id = $linha['id'];
    echo "   ";
	echo "<a href='apagaproduto.php?id=$id'>Apagar</a><br>";
    }
} else {
    echo "Erro no comando SQL";
}
    ?>

</body>
</html>  

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