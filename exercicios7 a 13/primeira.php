<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Por favor, insira seu nome:</h1>
    <form action="mostra.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <input type="submit" value="Enviar">
    </form>
<?php
    include 'guarda.php';
    session_start();

    $_SESSION['nome'] = $_POST['nome'];


?>
</body>
</html>