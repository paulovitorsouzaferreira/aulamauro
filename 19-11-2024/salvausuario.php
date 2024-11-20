<?php

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

if (isset($data['nome'], $data['email'], $data['senha'], $data['tecnico'])) {
    $nome = $data['nome'];
    $email = $data['email'];
    $senha = $data['senha'];
    $tecnico = $data['tecnico']; 
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    try {
        
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tecnico) VALUES (:nome, :email, :senha, :tecnico)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaCriptografada);
        $stmt->bindParam(':tecnico', $tecnico, PDO::PARAM_INT); 

        if ($stmt->execute()) {
            echo json_encode(['status' => 'sucesso', 'mensagem' => 'Usuário cadastrado com sucesso']);
        } else {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar o usuário']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao acessar o banco de dados: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
}
?>
