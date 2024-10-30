<?php
include 'conexao.php';

$nome = $_POST['nome'];
$COREN = $_POST['COREN'];
$usuario = $_POST['usuario'];
$senha = ($_POST['senha']);

$sql = "INSERT INTO medicos (nome, especialidade, COREN, usuario, senha) VALUES ('$nome', '$especialidade', '$COREN', '$usuario', '$senha')";
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