<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>

    <form id="formCadastro">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

       
        <label for="tecnico">É técnico?</label>
        <input type="checkbox" id="tecnico" name="tecnico"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
        document.getElementById('formCadastro').addEventListener('submit', function(event) {
            event.preventDefault();

            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            const tecnico = document.getElementById('tecnico').checked ? 1 : 0; 

            const dados = {
                nome: nome,
                email: email,
                senha: senha,
                tecnico: tecnico 
            };

            fetch('salvausuario.php', {
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
            document.getElementById('email').value = '';
            document.getElementById('senha').value = '';
            document.getElementById('tecnico').checked = false; 
        });
    </script>
</body>
</html>
