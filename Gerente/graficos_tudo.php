<!DOCTYPE html>
<?php
	include 'menu.php';
	include 'grafico_chaves.php';
	
?>
<html>
	<head>
		<title>Gráficos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<style>		
		</style>		
	</head>
	<body>
		<div class="container">
			<!-- Stack the columns on mobile by making one full-width and the other half-width -->
			<div class="row">
			  <div class="col-xs-12 col-md-12"><h1>Gráficos</h1></div>
			</div>

			<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
			<div class="row">
				<div class="col-xs-6 col-md-6">
					<div id='area_grafico_prod'></div>
						<form method="post" action="teste.php">
							<input type="hidden" name="note_input" id="note_input">
					</form>
				</div>
				<div class="col-xs-6 col-md-6">
					<div id='area_grafico'></div>
						<form method="post" action="teste.php">
							<input type="hidden" name="chart_input" id="chart_input">
						</form>
				</div>
			</div>

			<!-- Columns are always 50% wide, on mobile and desktop -->
			<div class="row">
			  <div class="col-xs-6">.col-xs-6</div>
			  <div class="col-xs-6">.col-xs-6</div>
			</div>
		</div>
	</body>
</html>