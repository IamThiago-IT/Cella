<!DOCTYPE html>
<?php
	include "menu.php";
?>
<html lang="pt-br">
<head>

			<title>Saída de materiais</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
	<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
	<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">


</head>
<body>
<br>
<br>
<br>
<div class="container" style= "width:1000px;">
<div class="row">
<div class="col-sm-12">
	<form action='' method='POST' autocomplete='off'>
		<div class="form-group">
			<h1>Saída de materiais</h1><br>
			<b><h4>Nome da pessoa:</h4></b>
			<input type='text' class="form-control input-lg" name='nome' placeholder="Nome da pessoa"><br>
			<b><h4>Nome do material:</h4></b>
			<input type='text' class="form-control input-lg" name='nome' placeholder="Nome do material"><br>
			<b><h4>Marca:</h4></b>
			<input type='text' class="form-control input-lg" name='marca' placeholder="Marca"><br>
			<b><h4>Quantidade:</h4></b>
			<input type='text' class="form-control input-lg" name='quantidade' placeholder="Quantidade"><br>
			<b><h4>Data de saída:</h4></b>
			<input type='text' class="form-control input-lg" name='data' placeholder="Data de saída"><br><br>
			<input type="submit" class="btn-default btn-lg btn-block" name="enviar_3" value="Salvar">	
		</div>
	</form>
</div>
</div>
</div>
</body>
</html>