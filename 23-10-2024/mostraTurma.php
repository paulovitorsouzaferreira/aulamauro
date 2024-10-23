<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver notas do aluno</title>
</head>
<body>
        <?php
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';
        
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        
        $id = 2;

        $sql = "SELECT * FROM `alunos` WHERE `id_turma` = $id";
        
        try{
            $comando = $conexao->prepare($sql);
            $resultado = $comando->execute();

            if($resultado){
                while($linha = $comando->fetch()){
                    echo "<p> " . $linha['nome'];
                }
            }
        }
        catch (Exception $e) {
            echo "Erro $e";
        }
        ?>
</body>
</html>