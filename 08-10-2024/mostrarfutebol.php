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
$banco = 'futebol';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$comandoSQL = 'SELECT * FROM `times`';

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {

    while($linha = $comando->fetch()) {
	echo $linha['nome'];
    echo "   ";
    echo $linha['pontos'];
    echo "   ";
	$id = $linha['id'];
    echo "   ";
	echo "<a href='apagafutebol.php?id=$id'>Apagar</a><br>";
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
    <title>Times Salvos</title>
</head>
<body>
    <br>
<a href="pagfutebol.html">Voltar</a>
</body>
</html>