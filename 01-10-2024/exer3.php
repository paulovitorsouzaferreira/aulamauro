<?php


$servidor = 'localhost';
$banco = 'produto';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
echo "Conectado!<br>";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $nome = $_GET['nome'] ?? '';
    $url_foto = $_GET['url_foto'] ?? '';
    $descricao = $_GET['descricao'] ?? '';
    $preco = $_GET['preco'] ?? '';

    echo "Recebido: <br>";
    echo "Nome: $nome<br>";
    echo "URL da Foto: $url_foto<br>";
    echo "Descrição: $descricao<br>";
    echo "Preço: $preco<br>";

    
    $codigoSQL = "INSERT INTO `produtos` (`id`, `nome`, `url_foto`, `descricao`, `preco`) VALUES (NULL, :nome, :url_foto, :descricao, :preco)";

    try {
        $comando = $conexao->prepare($codigoSQL);
        $resultado = $comando->execute(array(
            'nome' => $nome,
            'url_foto' => $url_foto,
            'descricao' => $descricao,
            'preco' => $preco
        ));

        if ($resultado) {
            echo "Produto salvo com sucesso!";
        } else {
            echo "Erro ao salvar o produto!";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

$conexao = null;
?>