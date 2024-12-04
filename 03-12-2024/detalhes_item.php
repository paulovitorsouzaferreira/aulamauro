<?php
session_start();
include 'conexao.php';

if (!isset($_GET['id'])) {
    echo "ID do item não fornecido.";
    exit();
}

$id_item = $_GET['id'];
$sql = "SELECT * FROM itens WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_item);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor_lance = $_POST['valor_lance'];

    
    if ($valor_lance >= $item['minimo']) {
        $usuario_id = $_SESSION['usuario_id'];
        $sql_lance = "INSERT INTO lances (id_item, id_usuario, valor) VALUES (?, ?, ?)";
        $stmt_lance = $conn->prepare($sql_lance);
        $stmt_lance->bind_param("iid", $id_item, $usuario_id, $valor_lance);
        if ($stmt_lance->execute()) {
            echo "Lance feito com sucesso!";
        } else {
            echo "Erro ao fazer o lance.";
        }
    } else {
        echo "O lance deve ser maior que o valor mínimo!";
    }
}

echo "<h2>" . $item['nome'] . "</h2>";
echo "<img src='" . $item['imagem'] . "' alt='" . $item['nome'] . "'>";
echo "<p>Valor Mínimo: " . $item['minimo'] . "</p>";

?>

<form method="post">
    <label for="valor_lance">Seu Lance:</label>
    <input type="number" id="valor_lance" name="valor_lance" required>
    <button type="submit">Fazer Lance</button>
</form>
