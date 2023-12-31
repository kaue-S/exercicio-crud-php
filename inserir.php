<?php
require_once "src/funcoes-alunos.php";

	if(isset($_POST['cadastrar'])){
		
		$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
		$primeiraNota = filter_input(INPUT_POST, "primeira", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
		$segundaNota = filter_input(INPUT_POST, "segunda", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

		inserirAluno($conexao, $nome, $primeiraNota, $segundaNota);
		header("location:visualizar.php");

	}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
	<div class="inserir">
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
		<div>
			<p><label for="nome"><b>Nome: </b> </label><br>
			<input type="text" id="nome" name="nome" placeholder="Nome" required></p>

			<p><label for="primeira"><b>Primeira Nota: </b></label><br>
			  <input type="number" id="primeira" name="primeira" step="0.01" min="0.00" max="10.00" placeholder="ex:7,50" required></p>

			  <p><label for="segunda"><b>Segunda Nota: </b></label><br>
			  <input type="number" id="segunda" name="segunda" step="0.01" min="0.00" max="10.00" placeholder="ex:7,50"required></p>
		</div>     
	    
      <button type="submit" name="cadastrar">Cadastrar aluno</button>
	</form>
	</div>
    <p class="link-voltar"><i class="fa-solid fa-house" style="color: #ffffff;"> </i><a href="index.php"> Voltar ao início</a></p>
</div>

</body>
</html>