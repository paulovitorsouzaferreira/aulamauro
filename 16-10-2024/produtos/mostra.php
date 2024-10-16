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
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>URL da Foto</th>
            <th>Ações</th>
        </tr>
        <?php
        // conexão
        $servidor = 'localhost';
        $banco = 'produto';
        $usuario = 'root';
        $senha = '';

        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

        $codigoSQL = "SELECT * FROM `produtos`";

        try {
            $comando = $conexao->prepare($codigoSQL);
            $resultado = $comando->execute();

            if ($resultado) {
                while ($linha = $comando->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['descricao']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['preco']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['url_foto']) . "</td>";
                    $id = $linha['id'];
                    echo "<td><a href='deleta.php?id=$id'>Apagar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Erro ao executar o comando!</td></tr>";
            }
        } catch (Exception $e) {
            echo "<tr><td colspan='5'>Erro: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }

        $conexao = null;
        ?>
    </table>

    

    <form action="deleta.php">
        <p>Informe o ID do item que deseja apagar</p>
        <label for="id">ID:</label>
        <input type="text" name="id"><br>
        <input type="submit">
    </form>

    <form action="index.php">
        <input type="submit" value="Voltar para Pagina Principal" class="btn">
    </form>
</body>
</html>
