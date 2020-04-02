<!DOCTYPE html>
<?php
	include "menu.php";
	

	
	
	
	
?>
<html lang="pt-br">
<head>

	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
	<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
	<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">


<style>

	.logo1{
				
		position: absolute;
		left: 265px;
		width: 150px; 
		height: 85px;
		top: 0px;
	}
	
	.head{

		position: absolute;
		left: 0px;
		width: 681px; 
		height: 85px;
		top: 0px;
	}


</style>
</head>
<body align="center">
<br>
<br>
<br>
<div class="container">
			<div class="row">
			<div class="col-sm">
			</div>
			<div class="col-sm-7">
			
			<form action='confirmar_senha.php' method='POST' autocomplete='off'>
				<div class="head" style="background-color:#035e7f;"></div>
					<div class="form-group">
					<img src="../img/logoBandeira.png" class="logo1"><br><br><br>
					<font align="center" size="4px">ALTERAR SENHA</font><br><br>
					<select class="form-control input-lg">
					<option value="email">rafaelcsmah@gmail.com</option>
					<option value="email">mariaenegrelli@gmail.com</option>
					<option value="email">thiagodossantos315@gmail.com</option>
					</select><br>
					<input type="password" class="form-control input-lg" placeholder="Digite a sua senha"><br>
					<input type="submit" class="btn-default btn-lg btn-block" value="Avançar"><br>
			
					</div>
			</form>
	</div>
</div>