<?php
session_start();
include 'conexao.php';

$sql = "SELECT r.data_administracao, r.hora_administracao, p.leito 
        FROM receitas r 
        JOIN pacientes p ON r.paciente_id = p.id 
        WHERE NOT EXISTS (SELECT * FROM administracoes a WHERE a.receita_id = r.id)";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "Data: " . $row['data_administracao'] . " - Hora: " . $row['hora_administracao'] . " - Leito: " . $row['leito'] . "<br>";
}
?>
