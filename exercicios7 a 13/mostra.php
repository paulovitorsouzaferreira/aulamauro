<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>

<?php
include 'guarda.php';
    
?>
    <h1>Seu nome:</h1>
    <?php 
    session_start();

    echo $_SESSION['nome'];

    ?>  
    <h1>Excluir?</h1>
    <form action="encerraSessao.php" method="post">
</body>
</html>