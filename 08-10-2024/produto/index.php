<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe dados</title>
</head>
<body>
    <form action="salva.php">
	<label for="nome">Nome:</label>
	<input type="text" name="nome"><br>
	<label for="descricao">Descrição:</label>
	<input type="text" name="descricao"><br>
    <label for="preco">Preço:</label>
	<input type="text" name="preco"><br>
    <label for="url">Url da imagem:</label>
	<input type="text" name="url"><br>
	<input type="submit">
    </form>
    <form action="mostra.php">
        <p>Ver dados já inseridos</p>
        <input type="submit">
    </form>
</body>

</html>
