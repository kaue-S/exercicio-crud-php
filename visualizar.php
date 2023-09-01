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
            // $media = $alunos['media'];
            $primeiraNota = number_format($alunos['primeira_nota'], 2, ',', '');
            $segundaNota = number_format($alunos['segunda_nota'], 2, ',', '');
            $media = number_format($alunos['media'], 2, ',', '');

        ?>
            <article>
                <h3>Nome: <?= $alunos['nome'] ?></h3>
                <p>Primeira nota: <?= $primeiraNota ?></p>
                <p>Segunda nota: <?= $segundaNota ?></p>
                <p>Media: <?= $media ?></p>
                <p><a href="atualizar.php">Atualizar</a></p>
            </article>

        <?php
            if ($media >= 7) {
                echo "Aprovado!";
            } else if ($media >= 5 & $media < 7) {
                echo "Recuperação!";
            } else {
                echo "Reprovado!";
            }
        }
        ?>

        <p><a href="atualizar.php?id=<?=$aluno['id']?>">Atualizar</a></p>


        <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->
        

        <p><a href="index.php">Voltar ao início</a></p>
    </div>

</body>

</html>