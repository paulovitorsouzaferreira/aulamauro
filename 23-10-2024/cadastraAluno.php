<?php
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';
        
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

        $sql = "SELECT `id` from `turmas2`";
        $result = $conexao->query($sql);
        $validador = $result->fetchAll(); 
        
        $nome = $_GET['nome'];
        $turma = $_GET['turma'];
        
        $codigoSQL = "INSERT INTO `alunos` (`id`, `nome`, `id_turma`) VALUES (NULL, '', ''), (NULL, '{$_GET['nome']}', '{$_GET['turma']}')";

        if(strlen($nome) <= 0 || in_array($turma, $validador) == false){
            try {
                $resultado = $conexao->exec($codigoSQL);
                if($resultado){
                    echo "sucesso";
                }
                else{
                    echo "erro";
                }
            }
            catch( Exception $e) {
                echo "erro $e";
            }
        }