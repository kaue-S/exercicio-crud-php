<?php
    require_once "conexao.php";

    //função para inserir aluno
    
    function inserirAluno(PDO $conexao, string $nome, float $primeiraNota, float $segundaNota):void{
        $sql = "INSERT INTO alunos(nome, primeira_nota, segunda_nota) VALUES (:nome, :primeira_nota, :segunda_nota)";
    
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
            $consulta->bindValue(":primeira_nota", $primeiraNota, PDO::PARAM_STR);
            $consulta->bindValue(":segunda_nota", $segundaNota, PDO::PARAM_STR);
           
    
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao tentar inserir: ".$erro->getMessage());
        }
    }

// função para ler alunos

function lerAlunos(PDO $conexao){
    $sql = "SELECT nome, primeira_nota, segunda_nota, (primeira_nota + segunda_nota) / 2 AS media FROM alunos";

    
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}


?>