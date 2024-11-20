<?php
session_start(); 

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





$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['nome'])) {
    $nome = $data['nome'];
    
  
    $id = $_SESSION['id'];

    try {
        
        $stmt = $pdo->prepare("INSERT INTO departamentos (nome, id) VALUES (:nome, :id)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'sucesso', 'mensagem' => 'Departamento cadastrado com sucesso']);
        } else {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar o departamento']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao acessar o banco de dados: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
}
?>
