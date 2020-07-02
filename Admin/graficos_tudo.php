<!DOCTYPE html>
<?php
	include 'menu.php';
	include 'grafico_chaves.php';
	
?>
<html>
	<head>
		<title>Gráficos</title>
		<meta charset="utf-8" />
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="sortcut icon" href="img/shortcut_cella.png" type="image/png" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
		<style>
			body{
				background-color:#fff;
			}
			.flex-container{
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
				align-items: center;
			}
			.flex-container > div {
				padding-top: 2%;
				margin:1%;
				line-height: 79px;
				font-size: 30px;
			}
		</style>
	</head>
	<body> 
		<!--Para chaves_emprestadas.php-->
		<form>
			<input type="hidden" name="chart_input" id="chart_input">
		</form>
		<!--Para pegardados.php-->
		<form>
			<input type="hidden" name="mat_input" id="mat_input">
		</form>
		<!--Para pegador_note.php-->
		<form>
			<input type="hidden" name="note_input" id="note_input">
		</form>
		<!--Para note_mais_pegado.php-->
		<form>
			<input type="hidden" name="note_emp" id="note_emp">
		</form>
		<!--Para chaves_mais_emp.php-->
		<form>
			<input type="hidden" name="chaves_input" id="chaves_input">
		</form>
		<!--Para mais_emprestados.php-->
		<form>
			<input type="hidden" name="mais_emp" id="mais_emp">
		</form>
		<div class="flex-container">
			<div id='area_grafico'>
				<!--Para chaves_emprestadas.php-->
			</div>
			<div id='area_emp'>
				<!--Para pegardados.php-->
			</div>
			<div id='area_grafico_prod'>
				<!--Para pegador_note.php-->
			</div>
			<div id='area_note'>
				<!--Para note_mais_pegado.php-->
			</div>
			<div id='area_mais_chaves'>	
				<!--Para mais_emprestados.php-->
			</div>
			<div id='area_mais_emp'>
				<!--Para mais_emprestados.php-->
			</div>
		</div>
	</body>
</html>