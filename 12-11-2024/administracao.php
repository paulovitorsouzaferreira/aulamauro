<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php';  

    
    $paciente = mysqli_real_escape_string($conn, $_POST['paciente']);
    $medicamento = mysqli_real_escape_string($conn, $_POST['medicamento']);
    $data = mysqli_real_escape_string($conn, $_POST['Data']);
    $hora = mysqli_real_escape_string($conn, $_POST['Hora']);
    $dose = mysqli_real_escape_string($conn, $_POST['Dose']);
    $dataeHora = mysqli_real_escape_string($conn, $_POST['DataeHora']);

    
    if (empty($paciente) || empty($medicamento) || empty($data) || empty($hora) || empty($dose) || empty($dataeHora)) {
        echo "Por favor, preencha todos os campos.";
    } else {
       
        $sql = "INSERT INTO administracao (paciente, medicamento, Data, Hora, Dose, DataeHora) 
                VALUES ('$paciente', '$medicamento', '$data', '$hora', '$dose', '$dataeHora')";

        if (mysqli_query($conn, $sql)) {
            echo "Dados salvos com sucesso!";
        } else {
            echo "Erro ao salvar os dados: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);  
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administração de Medicamentos</title>
    <script>
        function envia() {
            
            var paciente = document.getElementById('paciente').value;
            var medicamento = document.getElementById('medicamento').value;
            var Data = document.getElementById('Data').value;
            var Hora = document.getElementById('Hora').value;
            var Dose = document.getElementById('Dose').value;
            var DataeHora = document.getElementById('DataeHora').value;

            
            var dados = new FormData();
            dados.append('paciente', paciente);
            dados.append('medicamento', medicamento);
            dados.append('Data', Data);
            dados.append('Hora', Hora);
            dados.append('Dose', Dose);
            dados.append('DataeHora', DataeHora);
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); 
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    
                    document.getElementById('saida').textContent = xhr.responseText;
                }
            };
            xhr.send(dados);
        }
    </script>
</head>
<body>
    <h1>Cadastro de Administração de Medicamentos</h1>

    <label for="paciente">Paciente:</label>
    <input type="text" id="paciente" required><br>

    <label for="medicamento">Medicamento:</label>
    <input type="text" id="medicamento" required><br>

    <label for="Data">Data:</label>
    <input type="date" id="Data" required><br>

    <label for="Hora">Hora:</label>
    <input type="time" id="Hora" required><br>

    <label for="Dose">Dose:</label>
    <input type="text" id="Dose" required><br>

    <label for="DataeHora">Data e Hora de Registro:</label>
    <input type="datetime-local" id="DataeHora" required><br>

    <input type="button" value="Salvar Dados" onclick="envia()">

    <p id="saida"></p>  
</body>
</html>
