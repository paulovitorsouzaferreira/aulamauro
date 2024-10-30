<?php
include 'conexao.php';

$Nomedopaciente = $_POST['paciente'];
$Nomedomedicamento = $_POST['medicamento'];
$Datadaadministração = $_POST['Data'];
$Horadaadministração = $_POST['Hora'];
$Dose = $_POST['Dose'];
$DataeHoradoregistro = $_POST['DataeHora'];

$sql = "INSERT INTO administracao (paciente, medicamento, Data, Hora, Dose,DataeHora) VALUES ('$Nomedopaciente', '$Nomedomedicamento', '$Datadaadministração', '$Horadaadministração', '$Dose', '$DataeHoradoregistro ')";
mysqli_query($conn, $sql);
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