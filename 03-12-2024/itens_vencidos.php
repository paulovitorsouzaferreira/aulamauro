<?php
session_start();
include 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM itens WHERE vencedor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

while ($item = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $item['nome'] . "</h3>";
    echo "<p>Vencedor: " . $usuario_id . "</p>";
    echo "<p>Valor Mínimo: " . $item['minimo'] . "</p>";
    echo "</div>";
}
?>
