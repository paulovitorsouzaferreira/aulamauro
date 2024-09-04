<nav class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Matemática</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php if($pg_atual == 'home'): ?>
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        <?php else: ?>
          <a class="nav-link" href="#">Home</a>
        <?php endif; ?>
        </li>
        <li class="nav-item">
        <?php if($pg_atual == 'soma'): ?>
          <a class="nav-link active" aria-current="page" href="#">Soma</a>
        <?php else: ?>
          <a class="nav-link" href="recebe_numeros_soma.php">Soma</a>
        <?php endif; ?>
          
        </li>
        <li class="nav-item">
        <?php if($pg_atual == 'subtrair'): ?>
          <a class="nav-link active" aria-current="page" href="#">Subtração</a>
        <?php else: ?>
          <a class="nav-link" href="recebe_numeros_subtração.php">Subtração</a>
        <?php endif; ?>
          
        </li>

        </li>
        <li class="nav-item">
        <?php if($pg_atual == 'divisao'): ?>
          <a class="nav-link active" aria-current="page" href="#">Divisão</a>
        <?php else: ?>
          <a class="nav-link" href="recebe_numeros_divisao.php">Divisão</a>
        <?php endif; ?>
          
        </li>

        <li class="nav-item">
        <?php if($pg_atual == 'multiplicacao'): ?>
          <a class="nav-link active" aria-current="page" href="#">Multiplicão</a>
        <?php else: ?>
          <a class="nav-link" href="recebe_numeros_multiplicacao.php">Multiplicão</a>
        <?php endif; ?>
          
        </li>
        <li class="nav-item">
        <?php if($pg_atual == 'resultado'): ?>
          <a class="nav-link active" aria-current="page" href="#">Resultado</a>
        <?php else: ?>
          <a class="nav-link" href="#">Resultado</a>
        <?php endif; ?>
          
        </li>
      </ul>
    </div>
  </div>
</nav>