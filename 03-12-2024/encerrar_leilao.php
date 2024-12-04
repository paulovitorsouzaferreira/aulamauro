<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    echo "Você precisa estar logado.";
    exit();
}

$id_item = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

// Verifica se o usuário logado é o dono do item
$sql = "SELECT * FROM itens WHERE id = ? AND usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_item, $usuario_id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();

if ($item) {
    // Encerrar o leilão e gravar o vencedor
    $sql_lance = "SELECT id_usuario FROM lances WHERE id_item = ? ORDER BY valor DESC LIMIT 1";
    $stmt_lance = $conn->prepare($sql_lance);
    $stmt_lance->bind_param("i", $id_item);
    $stmt_lance->execute();
    $vencedor = $stmt_lance->get_result()->fetch_assoc()['id_usuario'];

    $sql_update = "UPDATE itens SET estado = 'encerrado', vencedor = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ii", $vencedor, $id_item);
    if ($stmt_update->execute()) {
        echo "Leilão encerrado. O vencedor foi o usuário com ID: " . $vencedor;
    }
}
?>
