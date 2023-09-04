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

        <table border="1px solid">
        <tr>
            <th>Alunos</th>
            <th>Primeira Nota</th>
            <th>Segunda Nota</th>
            <th>Media</th>
            <th>Situação</th>
            <th colspan="2">Opções</th>
        </tr>

    <?php foreach ($listaDeAlunos as $alunos) {
    $primeiraNota = number_format($alunos['primeira_nota'], 2, ',', '');
    $segundaNota = number_format($alunos['segunda_nota'], 2, ',', '');
    $media = $alunos['media'];

    // Calcula a situação com base na média
    if ($media >= 7) {
         $situacao = "<b style=color:green>Aprovado!</b>";
    } elseif ($media >= 5 && $media < 7) {
         $situacao = "<b style=color:#FFD700>Recuperação!</b>";
    } else {
         $situacao = "<b style=color:red>Reprovado!</b>";
    }
?>

        <tr>
            <td><?= $alunos['nome'] ?></td>
            <td><?= $primeiraNota ?></td>
            <td><?= $segundaNota ?></td>
            <td><?= number_format($media, 2, ',', '.') ?></td>
            <td><?= $situacao ?></td>
            <td class="atu"><a href="atualizar.php?id=<?=$alunos['id']?>">Editar</a></td>
            <td class="exc"><a class="excluir" href="excluir.php?id=<?=$alunos['id']?>">Excluir</a></td>
        </tr>

        <?php    
        }
        ?>
    </table>
        <div class="linkes">
            <p class="link"><a href="inserir.php">Inserir novo aluno</a></p>
            <p class="link"><a href="index.php">Voltar ao início</a></p>
        </div>
    </div>
<script src="js/confirmar-exclusao.js"></script>
</body>

</html>