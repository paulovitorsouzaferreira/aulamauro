<?php
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}


echo "<h1>Bem-vindo, " . $_SESSION['usuario_nome'] . "!</h1>";
echo "<p>Você está logado.</p>";

echo "<p><a href='departamentos.php'>Departamento</a></p>";
echo "<p><a href='chamados.php'>Chamados</a></p>";
echo "<p><a href='logout.php'>Sair</a></p>";

?>
