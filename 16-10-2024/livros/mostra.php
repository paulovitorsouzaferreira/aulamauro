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
    <h1>Lista de Livros</h1>
    <table>
        <tr>
            <th>Título</th>
            <th>Idioma</th>
            <th>Quantidade de Páginas</th>
            <th>Editora</th>
            <th>Data de Publicação</th>
            <th>ISBN</th>
            <th>Ações</th>
        </tr>
        <?php
        // conexão
        $servidor = 'localhost';
        $banco = 'bibleoteca';
        $usuario = 'root';
        $senha = '';

        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

        $codigoSQL = "SELECT * FROM `livro`";

        try {
            $comando = $conexao->prepare($codigoSQL);
            $resultado = $comando->execute();

            if ($resultado) {
                while ($linha = $comando->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['idioma']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['qtd_pag']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['editora']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['data_pub']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['ISBN']) . "</td>";
                    $id = $linha['id'];
                    echo "<td><a href='deleta.php?id=$id'>Apagar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Erro ao executar o comando!</td></tr>";
            }
        } catch (Exception $e) {
            echo "<tr><td colspan='7'>Erro: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }

        $conexao = null;
        ?>
    </table>

    
    <form action="deleta.php">
        <p>Informe o ID do item que deseja apagar</p>
        <label for="id">ID:</label>
        <input type="text" name="id"><br>
        <input type="submit" value="Apagar">
    </form>
    <br>
    <br>

    <form action="index.php">
        <button type="submit" class="btn">Voltar para Pagina Principal</button>
    </form>

</body>
</html>
