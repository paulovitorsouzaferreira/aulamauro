<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'conexao.php';
    $nome = $_POST['nome'];
    $leito = $_POST['leito'];
    $sql = "INSERT INTO pacientes (nome, leito) VALUES ('$nome', '$leito')";
    if (mysqli_query($conn, $sql)) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'error' => 'Erro ao inserir dados'];
    }
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <script>
        function envia() {
            var nome = document.getElementById('nome').value;
            var leito = document.getElementById('leito').value;
            var dados = new FormData();
            dados.append('nome', nome);
            dados.append('leito', leito);

            fetch('', {
                method: 'POST',
                body: dados
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('saida').textContent = "Dados enviados com sucesso!";
                } else {
                    document.getElementById('saida').textContent = "Erro ao enviar dados.";
                }
            })
            .catch(error => {
                document.getElementById('saida').textContent = "Erro na comunicação com o servidor.";
                console.error("Erro: ", error);
            });
        }
    </script>
</head>
<body>
    <h1>Cadastro de Paciente</h1>
    <label for="nome">Nome:</label>
    <input type="text" id="nome">
    <label for="leito">Leito:</label>
    <input type="text" id="leito">
    <input type="button" value="Enviar" onclick="envia()">
    <p id="saida"></p>
</body>
</html>
