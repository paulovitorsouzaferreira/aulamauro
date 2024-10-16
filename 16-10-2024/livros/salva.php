<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro Salvo</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
            margin-top: 20px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    // conexão
    $servidor = 'localhost';
    $banco = 'bibleoteca';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    // Exibir dados inseridos
    $titulo = htmlspecialchars($_GET['titulo']);
    $idioma = htmlspecialchars($_GET['idioma']);
    $qtd_pag = htmlspecialchars($_GET['qtd_pag']);
    $editora = htmlspecialchars($_GET['editora']);
    $dataPub = htmlspecialchars($_GET['dataPub']);
    $isbn = htmlspecialchars($_GET['isbn']);

    echo "<h2>Livro Salvo:</h2>";
    echo "<table>";
    echo "<tr><th>Título</th><th>Idioma</th><th>Quantidade de Páginas</th><th>Editora</th><th>Data de Publicação</th><th>ISBN</th></tr>";
    echo "<tr><td>$titulo</td><td>$idioma</td><td>$qtd_pag</td><td>$editora</td><td>$dataPub</td><td>$isbn</td></tr>";
    echo "</table>";

    // Inserir dados no banco
    $codigoSQL = "INSERT INTO `livro` (`id`, `titulo`, `idioma`, `qtd_pag`, `editora`, `data_pub`, `isbn`) 
    VALUES (NULL, :titulo, :idioma, :pag, :editora, :publicacao, :isbn)";

    try {
        $comando = $conexao->prepare($codigoSQL);
        $resultado = $comando->execute(array(
            'titulo' => $titulo,
            'idioma' => $idioma,
            'pag' => $qtd_pag,
            'editora' => $editora,
            'publicacao' => $dataPub,
            'isbn' => $isbn
        ));

        if ($resultado) {
            echo "<p>Livro inserido com sucesso!</p>";
        } else {
            echo "<p>Erro ao inserir o livro.</p>";
        }
    } catch (Exception $e) {
        echo "Erro: $e";
    }

    $conexao = null;
    ?>

    <form action="index.php">
        <button type="submit" class="btn">Voltar para Página Principal</button>
    </form>
</body>
</html>
