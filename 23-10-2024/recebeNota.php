<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nota</title>
</head>
<body>
    <form action="cadastraNota.php" method="get">
        <?php
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';
        
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        
        $sql = "SELECT * FROM `turmas2`";
        $result = $conexao->query($sql);
        $turmas = $result->fetchAll();
        $sql = "SELECT * FROM `alunos`";
        $result = $conexao->query($sql);
        $alunos = $result->fetchAll();
        echo"<select name='turma'>";
        echo"<option value=''>Selecione a turma";
        foreach ($turmas as $key) {
            echo "<option value='".$key["id"]."'>".$key["nome"]."</option>";
        }
        echo "</select><br>";
        echo"<select name='aluno'>";
        echo"<option value=''>Selecione o aluno";
        foreach ($alunos as $key) {
            echo "<option value='".$key["id"]."'>".$key["nome"]."</option>";
        }
        echo "</select><br>";
        ?>
        <label for="turma">Insira a nota do aluno</label><br>
        <input type="number" name="nota">
        <input type="submit">
    </form>
</body>
</html>