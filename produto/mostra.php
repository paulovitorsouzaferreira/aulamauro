<?php
include ("./Produto.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Produtos Cadastrados</h1>
    <?php
    if (isset($_SESSION['produtos']) && count($_SESSION['produtos']) > 0) {
        foreach ($_SESSION['produtos'] as $produto) {
            $produto->exibirInformacoes();
        }
    } else {
        echo '<p>Nenhum produto cadastrado.</p>';
    }
    ?>
    <a href="novo.php" class="btn btn-secondary">Cadastrar Novo Produto</a>
</div>
</body>
</html>
