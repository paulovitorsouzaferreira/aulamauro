<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Juros</title>
</head>
<body>
    <div id="mostrar">
        <label for="capital">Capital Inicial:</label>
        <input type="number" id="capital" required>

        <label for="taxa">Taxa de Juros (% a.a.):</label>
        <input type="number" id="taxa" required>

        <label for="tempo">Tempo (anos):</label>
        <input type="number" id="tempo" required>

        <input type="button" value="Calcular" onclick="envia()">

        <div id="resultado"></div>
    </div>

    <script>
        function envia() {
    
            let capital = parseFloat(document.getElementById('capital').value);
            let taxa = parseFloat(document.getElementById('taxa').value);
            let tempo = parseInt(document.getElementById('tempo').value);

            if (isNaN(capital) || isNaN(taxa) || isNaN(tempo)) {
                alert('Por favor, preencha todos os campos corretamente.');
                return;
            }

         
            let montante = capital * Math.pow(1 + taxa / 100, tempo);

 
            let resultadoDiv = document.getElementById('resultado');
            resultadoDiv.style.display = 'block'; 
            resultadoDiv.innerHTML = `Montante Final: R$ ${montante.toFixed(2)}`;
        }
    </script>
</body>
</html>
