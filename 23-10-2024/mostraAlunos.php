<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nota</title>
</head>
<body>
    <form action="mostraNotas.php" method="get">
        <?php
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';
        
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        
        $sql = "SELECT * FROM `alunos`";
        $result = $conexao->query($sql);
        $alunos = $result->fetchAll();
        echo "</select><br>";
        echo"<select name='aluno'>";
        echo"<option value=''>Selecione o aluno";
        foreach ($alunos as $key) {
            echo "<option value='".$key["id"]."'>".$key["nome"]."</option>";
        }
        echo "</select><br>";
        ?>
        <label for="turma">Ver notas do aluno</label><br>
        <input type="submit">
    </form>
</body>
</html>