<?php
session_start();
include 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM medicos WHERE usuario='$usuario'";
$result = mysqli_query($conn, $sql);
$medico = mysqli_fetch_assoc($result);

if ($senha = 'senha' ) {
    $_SESSION['medico_id'] = $medico['id'];
    header('Location: registrar_administracao.php');
} else {
    echo "Usuário ou senha inválidos.";
}
?>
