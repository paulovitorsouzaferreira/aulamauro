<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT r.data_administracao, r.hora_administracao, p.leito 
            FROM receitas r 
            JOIN pacientes p ON r.paciente_id = p.id 
           ";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $dados = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $dados[] = $row;
        }
        echo json_encode(['result' => $dados]);
    } else {
        echo json_encode(['result' => []]);
    }
    mysqli_close($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Dados</title>
    <script>
        async function carregaDados() {
            try {
                const response = await fetch('', { method: 'POST' });
                if (!response.ok) throw new Error('Erro ao carregar os dados.');
                const data = await response.json();
                const lista = document.getElementById('lista');
                lista.innerHTML = '';
                if (data.result.length > 0) {
                    data.result.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = `Data: ${item.data_administracao}, Hora: ${item.hora_administracao}, Leito: ${item.leito}`;
                        lista.appendChild(li);
                    });
                } else {
                    document.getElementById('saida').textContent = 'Nenhum dado encontrado.';
                }
            } catch (error) {
                document.getElementById('saida').textContent = 'Erro ao carregar os dados.';
            }
        }
        window.onload = carregaDados;
    </script>
</head>
<body>
    <h1>Dados de Administração de Medicamentos</h1>
    <ul id="lista"></ul>
    <p id="saida"></p>
</body>
</html>
