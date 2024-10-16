<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Salvo</title>
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
   
    $servidor = 'localhost';
    $banco = 'futebol';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

   
    $nome = htmlspecialchars($_GET['nome']);
    $quantidade = htmlspecialchars($_GET['quantidade']);

    echo "<h2>Time Salvo:</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Pontos</th></tr>";
    echo "<tr><td>$nome</td><td>$quantidade</td></tr>";
    echo "</table>";

    // Inserir dados no banco
    $codigoSQL = "INSERT INTO `times` (`id`, `nome`, `pontos`) VALUES (NULL, :nm, :qtd)";

    try {
        $comando = $conexao->prepare($codigoSQL);
        $resultado = $comando->execute(array('nm' => $nome, 'qtd' => $quantidade));

        if ($resultado) {
            echo "<p>Time inserido com sucesso!</p>";
        } else {
            echo "<p>Erro ao inserir o time.</p>";
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
