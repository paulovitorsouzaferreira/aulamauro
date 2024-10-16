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
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Detalhes do Livro</h1>
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

        try {
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }

        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;

        if ($id) {
            $codigoSQL = "SELECT `titulo`, `idioma`, `qtd_pag`, `editora`, `data_pub`, `ISBN`, `id` FROM `livro` WHERE `id` = :id";
            $comando = $conexao->prepare($codigoSQL);
            $comando->bindParam(':id', $id, PDO::PARAM_INT);

            try {
                $resultado = $comando->execute();

                if ($resultado) {
                    $linha = $comando->fetch(PDO::FETCH_ASSOC);
                    echo "<tr>";
                    echo "<form action='atualiza.php' method='post'>";
                    echo "<td><input type='text' name='titulo' value='" . htmlspecialchars($linha['titulo']) . "' required></td>";
                    echo "<td><input type='text' name='idioma' value='" . htmlspecialchars($linha['idioma']) . "' required></td>";
                    echo "<td><input type='number' name='qtd_pag' value='" . htmlspecialchars($linha['qtd_pag']) . "' required></td>";
                    echo "<td><input type='text' name='editora' value='" . htmlspecialchars($linha['editora']) . "' required></td>";
                    echo "<td><input type='date' name='data_pub' value='" . htmlspecialchars($linha['data_pub']) . "' required></td>";
                    echo "<td><input type='text' name='ISBN' value='" . htmlspecialchars($linha['ISBN']) . "' required></td>";
                    echo "<td>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($linha['id']) . "'>";
                    echo "<input type='submit' value='Atualizar'>";
                    echo "</form>";
                    echo "<form action='deletar.php' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($linha['id']) . "'>";
                    echo "<input type='submit' value='Deletar' onclick='return confirm(\"Tem certeza que deseja deletar este livro?\");'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='7'>Nenhum dado encontrado para o ID: " . htmlspecialchars($id) . "</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='7'>Erro: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>ID não fornecido.</td></tr>";
        }

        $conexao = null;
        ?>
    </table>

    <form action="index.php">
        <button type="submit" class="btn">Voltar para Página Principal</button>
    </form>
</body>
</html>
