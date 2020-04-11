<!DOCTYPE html>
<?php
	include 'menu.php';
	include 'grafico_chaves.php';
	
?>
<html>
	<head>
		<title>Gráficos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
		<style>
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
		<form>
			<input type="hidden" name="chart_input" id="chart_input">
		</form>
		<form>
			<input type="hidden" name="mat_input" id="mat_input">
		</form>
		<form>
			<input type="hidden" name="note_input" id="note_input">
		</form>
		<form>
			<input type="hidden" name="note_emp" id="note_emp">
		</form>
		<div class="flex-container">
			<div id='area_grafico'>
			</div>
			<div id='area_grafico_prod'>
			</div>
			<div id='area_note'>
			</div>
			<div id='area_emp'>
			</div>
			<div>
				
			</div>
			<div>
				
			</div>
			<div>
				
			</div>
		</div>
	</body>
</html>