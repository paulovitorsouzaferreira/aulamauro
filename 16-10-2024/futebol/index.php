<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receber Dados</title>
</head>
<body>
    <h1>Inserir Dados</h1>

  
    <form action="salva.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        
        <label for="quantidade">Pontos:</label>
        <input type="number" id="quantidade" name="quantidade" required><br>
        
        <input type="submit" value="Enviar">
    </form>

   
    <form action="mostra.php" method="get">
    <h2>Ver dados já inseridos</h2>
        <input type="submit" value="Mostrar Dados">
    </form>
    <br>
    <br>
    <br>

    <form action="mostrar.php" method="get">
    <h2>Atualizar Dados</h2>
    <label for="id">Digite o ID:</label>
    <input type="text" id="id" name="id" required><br>
    <input type="submit" value="Mostrar Dados">
</form>
</body>
</html>
