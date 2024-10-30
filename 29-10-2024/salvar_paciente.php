<?php
include 'conexao.php';

$nome = $_POST['nome'];
$leito = $_POST['leito'];

$sql = "INSERT INTO pacientes (nome, leito) VALUES ('$nome', '$leito')";
mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    sucesso!
</body>
</html>
