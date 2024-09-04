<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Simples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
$pg_atual = 'resultado';

include 'navbar.php';
?>
    <div class='container-fluid'>
        <h1>Resultado:</h1>
<?php

$n1 = $_GET['num1'];
$n2 = $_GET['num2'];
$n3 = $_GET['num3'];

$array = array($n1,$n2,$n3); 
function multiplicacao($array) 
{
  echo "$array[0] * $array[1] * $array[2]  = ", $array[0] * $array[1] * $array[2];
}

$resultado = multiplicacao($array);
echo $resultado;
?>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
