<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe dados</title>
</head>
<body>
    <form action="salva.php">
	<label for="titulo">Titulo:</label>
	<input type="text" name="titulo"><br>
	<label for="idioma">Idioma:</label>
	<input type="text" name="idioma"><br>
    <label for="qtd_pag">Preço:</label>
	<input type="text" name="qtd_pag"><br>
    <label for="editora">Editora:</label>
	<input type="text" name="editora"><br>
    <label for="dataPub">Data de publicação:</label>
	<input type="text" name="dataPub"><br>
    <label for="isbn">ISBN:</label>
	<input type="text" name="isbn"><br>
	<input type="submit">
    </form>
    <form action="mostra.php">
        <p>Ver dados já inseridos</p>
        <input type="submit">
    </form>
</body>

</html>
