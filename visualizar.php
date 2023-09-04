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

    

    
    <?php foreach ($listaDeAlunos as $alunos) {
    $primeiraNota = number_format($alunos['primeira_nota'], 2, ',', '');
    $segundaNota = number_format($alunos['segunda_nota'], 2, ',', '');
    $media = $alunos['media'];

    // Calcula a situação com base na média
    if ($media >= 7) {
         $situacao = "<b style=color:blue>Aprovado!</b>";
    } elseif ($media >= 5 && $media < 7) {
         $situacao = "<b style=color:yellow>Recuperação!</b>";
    } else {
         $situacao = "<b style=color:red>Reprovado!</b>";
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
            <p><a class="excluir" href="excluir.php?id=<?=$alunos['id']?>">Excluir</a></p>
        </div>
        <?php    
        }
        ?>

        <p><a href="index.php">Voltar ao início</a></p>
    </div>
<script src="js/confirmar-exclusao.js"></script>
</body>

</html>