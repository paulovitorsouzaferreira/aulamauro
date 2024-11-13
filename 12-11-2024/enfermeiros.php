<?php

include 'conexao.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $coren = mysqli_real_escape_string($conn, $_POST['coren']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
   
    if (empty($nome) || empty($coren) || empty($usuario) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        
        $sql = "INSERT INTO enfermeiros (nome, coren, usuario, senha) 
                VALUES ('$nome', '$coren', '$usuario', '$senha')";
        
      
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
    <title>Cadastro de Médico</title>
    <script>
        function envia() {
            var nome = document.getElementById('nome').value;
            var coren = document.getElementById('coren').value;
            var usuario = document.getElementById('usuario').value;
            var senha = document.getElementById('senha').value;

            
            if (!nome || !coren || !usuario || !senha) {
                alert('Por favor, preencha todos os campos.');
                return;
            }

            var dados = new FormData();
            dados.append("nome", nome);
            dados.append("coren", coren);
            dados.append("usuario", usuario);
            dados.append("senha", senha);

            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true); 
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
    <h1>Cadastro de Médico</h1>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" required><br>

    <label for="coren">coren:</label>
    <input type="text" id="coren" required><br>

    <label for="usuario">Usuário:</label>
    <input type="text" id="usuario" required><br>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" required><br>

    <input type="button" value="Salvar Dados" onclick="envia()">

    <p id="saida"></p>  
</body>
</html>
