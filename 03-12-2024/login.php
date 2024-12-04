<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']); 

   
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $usuario = $result->fetch_assoc();
        if ($usuario['senha'] === $senha) {
            echo "Login bem-sucedido!";
            
            session_start();
            $_SESSION['usuario_id'] = $usuario['id']; 
            header('Location: pagina.php');
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>
