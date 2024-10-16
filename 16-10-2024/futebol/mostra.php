<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostra dados</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Lista de Times de Futebol</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Pontos</th>
            <th>Ações</th>
        </tr>
        <?php
        // conexão
        $servidor = 'localhost';
        $banco = 'futebol';
        $usuario = 'root';
        $senha = '';

        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

        $codigoSQL = "SELECT * FROM `times`";

        try {
            $comando = $conexao->prepare($codigoSQL);
            $resultado = $comando->execute();

            if ($resultado) {
                while ($linha = $comando->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['pontos']) . "</td>";
                    $id = $linha['id'];
                    echo "<td><a href='deleta.php?id=$id'>Apagar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Erro ao executar o comando!</td></tr>";
            }
        } catch (Exception $e) {
            echo "<tr><td colspan='3'>Erro: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }

        $conexao = null;
        ?>
    </table>


    <br>
    <br>
    <br>


    <form action="index.php">
        <button type="submit" class="btn">Voltar para Pagina Principal</button>
    </form>
</body>
</html>
