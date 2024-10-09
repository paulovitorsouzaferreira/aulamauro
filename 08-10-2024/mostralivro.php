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
$banco = 'livro';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$comandoSQL = 'SELECT * FROM `livro`';

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:<br>";
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
    ?>

</body>
</html>  

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Salvos</title>
</head>
<body>
    <br>
<a href="paglivro.html">Voltar</a>
</body>
</html>