<!DOCTYPE html>
<?php
	include 'menu.php';
?>
<html lang="pt-br">
	<head>
	<title>Lista de Empréstimos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<style>
			.glyphicon-duplicate{font-size:30px;color:#000;}
			body{
				height: 100vh;
			}
			.conteiner{
				height:50px;
				background-color: #F3FBFE;
				color: #fff;
				display:flex;
				flex-wrap: wrap;
				flex-direction: row-reverse;
				justify-content: start-reverse;
				align-items: center;
				padding-bottom: 10px;
				margin-bottom: 20px;
				z-index: 0;
				box-shadow: 0px 0px 10px -2px rgba(3,94,127,196);
			}
			.button{
				margin-right: 1%;
				margin-top: 5px;
				padding:4px;
				font-size: 20px;
				border: 1px solid #1ABC9C ;
				background-color: #1ABC9C ;
			}
			.principal{
				height: calc(100vh - 230px);
				padding: 20px;
				<!--color:white;-->
			}
			.rodape{
				height: 60px;
				background-color: #035e7f;
				display:flex;
				justify-content: center;
				align-items: center;
				font-size: 1.5rem;
				color: #fff;
			}
			.conteudo{
				font-size: 2rem;
			}
			.conteudo{
				position: relative;
				height: calc(100vh - 275px);
				overflow-y: scroll;
				background-color: #fff;
				padding: 20px;
				box-shadow: 0px 4px 15px -2px rgba(0,0,0,0.75);
			}
			.resultado{
				display: grid;
				grid-template-rows: 120px 1fr 60px;
				grid-template-columns: 50% 1fr;
				grid-template-areas: "direita esquerda"
			}
		</style>
	</head>
	<body>
		<main class="conteiner">
			<!--<button class="button"><a id='devolver'>3</a></button>-->
			<!--<button class="button"><a href="emprestimos_chaves.php">Chaves</a></button>-->
			<button class="button"><a href="#" id="suaAcao">Chaves</a></button>
			<!--<button class="button"><a href="emprestimos_notebooks.php">Notebooks</a></button>-->
			<button class="button"><a href="#" id="notebooks">Notebooks</a></button>
			<button class="button"><a href="#" id="emp">Empréstimos</a></button>
		</main>
		<main class="principal">
			<!--<center><h1>Aguardar </h1><center>-->
			<div>
				<div class="conteudo" id="suaDiv">
					
				</div>
				
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
	</body>
	<script>
	$(document).ready(function(){
	  $("#suaAcao").click(function(){
		$("#suaDiv").load('emprestimos_chaves.php');     
	  });
	});
	$(document).ready(function(){
	  $("#notebooks").click(function(){
		$("#suaDiv").load('emprestimos_notebooks.php');     
	  });
	});
	$(document).ready(function(){
	  $("#emp").click(function(){
		$("#suaDiv").load('emprestar.php');     
	  });
	});
	$(window).load(function() {
		$("#suaDiv").load('emprestar.php');     
	  });
	</script>
</html>
