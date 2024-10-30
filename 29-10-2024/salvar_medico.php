<?php
include 'conexao.php';

$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$usuario = $_POST['usuario'];
$senha = ($_POST['senha']);

$sql = "INSERT INTO medicos (nome, especialidade, crm, usuario, senha) VALUES ('$nome', '$especialidade', '$crm', '$usuario', '$senha')";
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