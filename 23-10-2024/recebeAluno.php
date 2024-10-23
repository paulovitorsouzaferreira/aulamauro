<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Turma</title>
</head>
<body>
    <form action="cadastraAluno.php">
        <?php
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';
        
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        
        $codigoSQL = "SELECT * FROM `turmas2`";

        try {
            $comando = $conexao->prepare($codigoSQL);
            $resultado = $comando->execute(); 
            echo"<select name='turma'>";
            echo"<option value=''>Selecione a turma";
            while($linha = $comando->fetch()) {
            echo "<option value='".$linha["id"]."'>".$linha["nome"]."</option>";
            }
        }
        catch( Exception $e) {
            echo "erro $e";
        }
        ?>
        <label for="turma">Insira o nome do novo aluno</label><br>
        <input type="text" name="nome">
        <input type="submit">
    </form>
</body>
</html>