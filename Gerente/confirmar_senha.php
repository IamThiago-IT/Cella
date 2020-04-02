<!DOCTYPE html>
<?php
	include "menu.php";
	

	
	
	
	
?>
<html lang="pt-br">
<head>

		<title>Confirmar Senha</title>	
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
			
			<form action='finalizacao_senha.php' method='POST' autocomplete='off'>
			<div class="head" style="background-color:#035e7f;">
			</div>
			<div class="form-group">
			<img src="../img/logoBandeira.png" class="logo1"><br><br><br>
			<font align="center" size="4px">CONFIRME A SENHA</font><br>			
			<font align="center" size="5px">NOME DO USUÁRIO</font><br><br>
			<div class="form-group">
			<input type="password" class="form-control input-lg" placeholder="Confirme a sua senha"><br>
			</div>
			<input type="submit" class="btn-default btn-lg btn-block" value="Concluir"><br><BR>
			</div>
		</form>
	</div>
</div>