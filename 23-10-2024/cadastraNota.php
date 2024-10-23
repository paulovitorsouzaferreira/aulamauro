<?php

$servidor = 'localhost';
$banco = 'sistema_notas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$sql = "SELECT `id` FROM `turmas2`";
$result = $conexao->query($sql);
$turmas = $result->fetchAll();
$sql = "SELECT `id` FROM `alunos`";
$result = $conexao->query($sql);
$alunos = $result->fetchAll();


$nota = $_GET['nota'];
$nota = intval($nota);
$turma = $_GET['turma'];
$aluno = $_GET['aluno'];

$codigoSQL = "INSERT INTO `notas` (`id`, `valor`, `id_turma`, `id_aluno`) VALUES (NULL, '', '', ''), (NULL, '{$nota}', '{$turma}', '{$aluno}')";

//if($nota<0 || $nota>10 or in_array($turma, $turmas) == false or in_array($aluno, $alunos) == false)
if($nota<0 or $nota>10){
    echo "parametros inválidos!";
}
else if(in_array($turma, $turmas) or in_array($aluno, $alunos)){
    echo "entrada inválida";
}else{
    try{
        $resultado = $conexao->exec($codigoSQL);
        if($resultado){
            echo "sucesso";
        }
        else echo"deu pau";
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }
}
