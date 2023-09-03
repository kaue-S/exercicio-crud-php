<?php
    require_once "src/funcoes-alunos.php";

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $aluno = lerUmAluno($conexao, $id);
    
    if(isset($_POST['atualizar-dados'])){
        
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $primeiraNota = filter_input(INPUT_POST, "primeira_nota", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $segundaNota = filter_input(INPUT_POST, "segunda_nota", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        
        atualizarAlunos($conexao ,$id, $nome, $primeiraNota, $segundaNota);
        header("location:visualizar.php");

    }

    $media = ($aluno['primeira_nota'] + $aluno['segunda_nota']) / 2;

    if ($media >= 7) {
        $situacao = "Aprovado";
    } elseif ($media >= 5 && $media < 7) {
        $situacao = "Recuperação";
    } else {
        $situacao = "Reprovado";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
	
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome" required value="<?=$aluno['nome']?>"></p>
        
        <p><label for="primeira_nota">Primeira nota:</label>
	    <input name="primeira_nota" type="number" id="primeira" step="0.01" min="0.00" max="10.00" required value="<?=$aluno['primeira_nota']?>"></p>
	    
	    <p><label for="segunda_nota">Segunda nota:</label>
	    <input name="segunda_nota" type="number" id="segunda" step="0.01" min="0.00" max="10.00" required value="<?=$aluno['segunda_nota']?>"></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média: </label>
            <input name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" readonly disabled value="<?=$aluno['media']?>">
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" name="situacao" id="situacao" value="<?=$situacao?>" readonly disabled>
        </p>
	    
        <button name="atualizar-dados">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>


</body>
</html>