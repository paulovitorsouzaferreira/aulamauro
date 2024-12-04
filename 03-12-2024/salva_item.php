    <?php
    session_start();
    include 'conexao.php';


    if (!isset($_SESSION['usuario_id'])) {
        echo "Você precisa estar logado para cadastrar um item.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_item = $_POST['nome_item'];
        $minimo = $_POST['minimo'];
        $imagem = $_FILES['imagem'];

        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($imagem["name"]);
        move_uploaded_file($imagem["tmp_name"], $target_file);

        
        $usuario_id = $_SESSION['usuario_id'];
        $sql = "INSERT INTO itens (nome, imagem, minimo, estado) VALUES (?, ?, ?, 'aberto')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssd", $nome_item, $target_file, $minimo);
        if ($stmt->execute()) {
            echo "Item cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar item: " . $stmt->error;
        }
    }
    ?>
