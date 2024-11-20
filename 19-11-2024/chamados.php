<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}


$host = 'localhost';
$dbname = 'sch';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro de conexão: ' . $e->getMessage()]);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $departamento = $_POST['departamento'];
    $descricao = $_POST['descricao'];
    $prioridade = $_POST['prioridade'];
    $responsavel = $_POST['responsavel'];
    $data_hora_limite = $_POST['data_hora_limite'];

    
    if (empty($departamento) || empty($descricao) || empty($prioridade) || empty($responsavel) || empty($data_hora_limite)) {
        $erro = "Todos os campos devem ser preenchidos!";
    } else {
       
        $stmt = $pdo->prepare("INSERT INTO chamados (criador_id, departamento, descricao, prioridade, responsavel, data_hora_limite) 
                               VALUES (:criador_id, :departamento, :descricao, :prioridade, :responsavel, :data_hora_limite)");
        $stmt->bindParam(':criador_id', $_SESSION['usuario_id']);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':prioridade', $prioridade);
        $stmt->bindParam(':responsavel', $responsavel);
        $stmt->bindParam(':data_hora_limite', $data_hora_limite);
        $stmt->execute();

        $sucesso = "Chamado criado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Chamado</title>
</head>
<body>
    <h1>Criar Novo Chamado</h1>

    <?php
    if (isset($erro)) {
        echo "<p style='color: red;'>$erro</p>";
    }
    if (isset($sucesso)) {
        echo "<p style='color: green;'>$sucesso</p>";
    }
    ?>

    <form method="POST" action="chamados.php">
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea><br><br>

        <label for="prioridade">Prioridade:</label>
        <select id="prioridade" name="prioridade" required>
            <option value="Baixa">Baixa</option>
            <option value="Média">Média</option>
            <option value="Alta">Alta</option>
        </select><br><br>

        <label for="responsavel">Responsável:</label>
        <input type="text" id="responsavel" name="responsavel" required><br><br>

        <label for="data_hora_limite">Data e Hora Limite:</label>
        <input type="datetime-local" id="data_hora_limite" name="data_hora_limite" required><br><br>

        <button type="submit">Criar Chamado</button>
    </form>

    <p><a href="dashboard.php">Voltar ao Dashboard</a></p>
</body>
</html>
