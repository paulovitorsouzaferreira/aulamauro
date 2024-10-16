<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostra dados</title>
    <style>
        /* Estilos aqui */
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

        try {
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }

        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;

        if ($id) {
            $codigoSQL = "SELECT `nome`, `pontos`, `id` FROM `times` WHERE `id` = :id";
            $comando = $conexao->prepare($codigoSQL);
            $comando->bindParam(':id', $id, PDO::PARAM_INT);

            try {
                $resultado = $comando->execute();

                if ($resultado) {
                    $linha = $comando->fetch(PDO::FETCH_ASSOC);
                    echo "<tr>";
                    echo "<td><form action='atualiza.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($linha['id']) . "'>";
                    echo "<input type='text' name='nome' value='" . htmlspecialchars($linha['nome']) . "' required>";
                    echo "</td>";
                    echo "<td><input type='number' name='pontos' value='" . htmlspecialchars($linha['pontos']) . "' required></td>";
                    echo "<td><input type='submit' value='Atualizar'></form></td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='3'>Nenhum dado encontrado para o ID: " . htmlspecialchars($id) . "</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='3'>Erro: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>ID não fornecido.</td></tr>";
        }

        $conexao = null;
        ?>
    </table>

    <form action="index.php">
        <button type="submit" class="btn">Voltar para Pagina Principal</button>
    </form>
</body>
</html>
