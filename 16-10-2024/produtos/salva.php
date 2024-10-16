<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto Salvo</title>
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
    $banco = 'produto';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    // Exibir dados inseridos
    $nome = htmlspecialchars($_GET['nome']);
    $descricao = htmlspecialchars($_GET['descricao']);
    $preco = htmlspecialchars($_GET['preco']);
    $url = htmlspecialchars($_GET['url']);

    echo "<h2>Produto Salvo:</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>URL da Foto</th></tr>";
    echo "<tr><td>$nome</td><td>$descricao</td><td>$preco</td><td>$url</td></tr>";
    echo "</table>";

    // Inserir dados no banco
    $codigoSQL = "INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `url_foto`) VALUES (NULL, :nm, :dc, :pc, :ul)";

    try {
        $comando = $conexao->prepare($codigoSQL);
        $resultado = $comando->execute(array('nm' => $nome, 'dc' => $descricao, 'pc' => $preco, 'ul' => $url));

        if ($resultado) {
            
        } else {
            
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
