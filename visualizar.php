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
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <div class="container">
        <h1>Lista de alunos</h1><br>

        <table border="1px solid">
        <tr>
            <th>Aluno</th>
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
            <td class="atu"><i class="fa-solid fa-pen-to-square" style="color: #264f97;"></i><a href="atualizar.php?id=<?=$alunos['id']?>">Editar Aluno</a></td>
            <td class="exc"><i class="fa-solid fa-trash-can" style="color: #fb0909;"></i><a class="excluir" href="excluir.php?id=<?=$alunos['id']?>">Excluir aluno</a></td>
        </tr>

        <?php    
        }
        ?>
    </table>
        <div class="linkes">
            <p class="link"><i class="fa-solid fa-plus" style="color: #ffffff;"></i><a href="inserir.php"> Inserir novo aluno</a></p>
            <p class="link"><i class="fa-solid fa-house"></i> <a href="index.php">Voltar ao início</a></p>
            
        </div>
    </div>
<script src="js/confirmar-exclusao.js"></script>
</body>

</html>