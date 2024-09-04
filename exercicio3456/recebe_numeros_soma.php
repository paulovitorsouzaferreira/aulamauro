<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Simples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
$pg_atual = 'soma';

include 'navbar.php';
?>
    <div class='container-fluid'>
        <h1>Calculadora de Soma</h1>
        <form action="soma.php">
            <label for="num1" class="form-label">Número 1:</label>
            <!-- $_GET['num1'] -->
            <input type="number" id="num1" name="num1" class="form-control"><br>

            <label for="num2" class="form-label">Número 2:</label>
            <!-- $_GET['num2'] -->
            <input type="number" id="num2" name="num2" class="form-control"><br>
            <input type="submit" value="Calcular" class="btn btn-primary">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>