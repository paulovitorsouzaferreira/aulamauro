<?php
session_start();

class Produto {
    public $nome;
    public $descricao;
    public $valor;
    public $imagem;

    public function __construct($nome, $descricao, $valor, $imagem) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->imagem = $imagem;
    }

    public function exibirInformacoes() {
        echo '<div class="card" style="width: 18rem;">';
        echo '<img src="' . htmlspecialchars($this->imagem) . '" class="card-img-top" style="height: 200px;" alt="' . htmlspecialchars($this->nome) . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($this->nome) . '</h5>';
        echo '<p class="card-text">' . htmlspecialchars($this->descricao) . '</p>';
        echo '<p class="card-text">R$ ' . number_format($this->valor, 2, ',', '.') . '</p>';
        echo '</div></div>';
    }
}
?>
