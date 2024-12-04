<?php
session_start();
include 'conexao.php';

$sql = "SELECT * FROM itens WHERE estado = 'aberto'";
$result = $conn->query($sql);

while ($item = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $item['nome'] . "</h3>";
    echo "<p>Valor Mínimo: " . $item['minimo'] . "</p>";
    echo "<a href='detalhes_item.php?id=" . $item['id'] . "'>Ver mais detalhes</a>";
    echo "</div>";
}
?>
