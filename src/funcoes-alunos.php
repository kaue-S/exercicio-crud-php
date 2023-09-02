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
    $sql = "SELECT id, nome, primeira_nota, segunda_nota, ((primeira_nota + segunda_nota) / 2) AS media FROM alunos";

    
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

// Função para ler um aluno

function lerUmAluno(PDO $conexao, int $id): array {
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        // Calcula a média e atribui ao array $resultado
        $primeiraNota = $resultado['primeira_nota'];
        $segundaNota = $resultado['segunda_nota'];
        $media = ($primeiraNota + $segundaNota) / 2;
        $resultado['media'] = $media;

    } catch (Exception $erro) {
        die("Algo deu errado ao atualizar: " . $erro->getMessage());
    }
    return $resultado;
}



//função para atualizar um aluno

function atualizarAlunos(PDO $conexao, int $id, string $nome, float $primeiraNota, float $segundaNota):void{
    $sql = "UPDATE alunos SET nome = :nome, primeira_nota = :primeira_nota, segunda_nota = :segunda_nota WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_STR);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeira_nota", $primeiraNota, PDO::PARAM_STR);
        $consulta->bindValue(":segunda_nota", $segundaNota, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("erro ao atualizar aluno ".$erro->getMessage());
    }
}
?>