<?php
require_once "src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Lista de alunos</h1>
        <hr>

        <p><a href="inserir.php">Inserir novo aluno</a></p>

        <?php
foreach ($listaDeAlunos as $alunos) {
    $primeiraNota = number_format($alunos['primeira_nota'], 2, ',', '');
    $segundaNota = number_format($alunos['segunda_nota'], 2, ',', '');
    $media = $alunos['media'];

    // Calcula a situação com base na média
    if ($media >= 7) {
        $situacao = "Aprovado";
    } elseif ($media >= 5 && $media < 7) {
        $situacao = "Recuperação";
    } else {
        $situacao = "Reprovado";
    }
?>
    <article>
        <h3>Nome: <?= $alunos['nome'] ?></h3>
        <p>Primeira nota: <?= $primeiraNota ?></p>
        <p>Segunda nota: <?= $segundaNota ?></p>
        <p>Média: <?= number_format($media, 2, ',', '.') ?></p>
        <p>Situação: <?= $situacao ?></p>
    </article>

        <div>
            <p><a href="atualizar.php?id=<?=$alunos['id']?>">Atualizar</a></p>
            <p><a href="excluir.php?id=<?=$alunos['id']?>">Excluir</a></p>
        </div>

        <?php    
        }
        ?>


        <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->
        

        <p><a href="index.php">Voltar ao início</a></p>
    </div>

</body>

</html>