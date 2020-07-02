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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="emprestimos.css">
	</head>
	<body>
		<br>
		<main class="conteiner">
			<button class="button"><a href="#" id="suaAcao">Chaves</a></button>
			<button class="button"><a href="#" id="notebooks">Notebooks</a></button>
			<button class="button"><a href="#" id="emp">Empréstimos</a></button>
		</main>
		<main class="principal">
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
	  $("a#devolver").click(function(){
			var id = $(this).attr("data-id");
			var nome = $(this).attr("data-target");
			if(confirm('Completar devolução ?'+ nome))
			{
				$.ajax({
				   url: 'devolucao.php',
				   type: 'POST',
				   data: {id_dev: id},
				   error: function() {
					  alert('Something is wrong');
				   },
				   success: function(data) {
						$("#"+id).remove(); 
						 location.reload();
				   }
				});
			}
		});
	</script>
</html>
