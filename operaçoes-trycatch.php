<?php
function validarNumero($numero) {
    if (!is_numeric($numero)) {
        throw new Exception("insira um número.");
    }
}

function calcular($num1, $num2, $operacao) {
    switch ($operacao) {
        case 'adição':
            return $num1 + $num2;
        case 'subtração':
            return $num1 - $num2;
        case 'multiplicação':
            return $num1 * $num2;
        case 'divisão':
            if ($num2 == 0) {
                throw new Exception(" DivisionZeroError.");
            }
            return $num1 / $num2;
        default:
            throw new Exception("InvalidOperation.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacao = $_POST['operacao'];

    try {
        validarNumero($num1);
        validarNumero($num2);
        
        $resultado = calcular($num1, $num2, $operacao);
        echo "Resultado da $operacao: $resultado";
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    } catch (Throwable $e) {
        echo "Um erro inesperado ocorreu: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
</head>
<body>
    <h1>Calculadora Simples</h1>
    <form method="post">
        <label for="num1">Número 1:</label>
        <input type="text" name="num1" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="text" name="num2" required>
        <br>
        <label for="operacao">Operação:</label>
        <select name="operacao" required>
            <option value="adição">Adição</option>
            <option value="subtração">Subtração</option>
            <option value="multiplicação">Multiplicação</option>
            <option value="divisão">Divisão</option>
        </select>
        <br>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
