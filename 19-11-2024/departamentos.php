<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Departamentos</title>
</head>
<body>
    <h1>Cadastro de Departamentos</h1>

    <form id="formCadastro">
        <label for="nome">Departamento:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
        document.getElementById('formCadastro').addEventListener('submit', function(event) {
            event.preventDefault();

            const nome = document.getElementById('nome').value;

            const dados = {
                nome: nome,
            };

            fetch('salvadepartamentos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dados),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.mensagem);
            })
            .catch(error => {
                console.error('Erro:', error);
            });

            document.getElementById('nome').value = '';
        });
    </script>
    <p><a href="dashboard.php">Voltar ao Dashboard</a></p>
</body>
</html>
