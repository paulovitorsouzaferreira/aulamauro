<?php
include 'conexao.php';

$nome_paciente = $_POST['nome_paciente'];
$medicamento = $_POST['medicamento'];
$data_administracao = $_POST['data_administracao'];
$hora_administracao = $_POST['hora_administracao'];
$dose = $_POST['dose'];


$sql = "SELECT id FROM pacientes WHERE nome='$nome_paciente'";
$result = mysqli_query($conn, $sql);
$paciente = mysqli_fetch_assoc($result);

if ($paciente) {
    $paciente_id = $paciente['id'];
    $sql = "INSERT INTO receitas (paciente_id, medicamento, data_administracao, hora_administracao, dose) VALUES ('$paciente_id', '$medicamento', '$data_administracao', '$hora_administracao', '$dose')";
    mysqli_query($conn, $sql);
} else {
    echo "Paciente não encontrado. Cadastre primeiro.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    sucesso!
</body>
</html>
