<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php';  

   
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $especialidade = mysqli_real_escape_string($conn, $_POST['especialidade']);
    $crm = mysqli_real_escape_string($conn, $_POST['crm']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

   
    if (empty($nome) || empty($especialidade) || empty($crm) || empty($usuario) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        
        $sql = "INSERT INTO medicos (nome, especialidade, crm, usuario, senha) 
                VALUES ('$nome', '$especialidade', '$crm', '$usuario', '$senha')";

        
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
            var especialidade = document.getElementById('especialidade').value;
            var crm = document.getElementById('crm').value;
            var usuario = document.getElementById('usuario').value;
            var senha = document.getElementById('senha').value;

           
            var dados = new FormData();
            dados.append("nome", nome);
            dados.append("especialidade", especialidade);
            dados.append("crm", crm);
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

    <label for="especialidade">Especialidade:</label>
    <input type="text" id="especialidade" required><br>

    <label for="crm">CRM:</label>
    <input type="text" id="crm" required><br>

    <label for="usuario">Usuário:</label>
    <input type="text" id="usuario" required><br>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" required><br>


    <input type="button" value="Salvar Dados" onclick="envia()">

    <p id="saida"></p>  
</body>
</html>
