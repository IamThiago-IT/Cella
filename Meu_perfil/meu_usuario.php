<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "menu_perfil.php";
	include "index.php";
	
	session_start();
	if($_SESSION["abrir"]!="YES"){
		header('location:../index.php');
	}
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero = $_SESSION['numero'];
	$senha = $_SESSION['senha_professor'];
	$tipo = $_SESSION['tipo_usuario'];
	$sql = "SELECT * FROM tipo_user WHERE tipo_usuario = $tipo "; 
	$materiais = $fusca -> prepare($sql);
	$materiais -> execute();
	foreach($materiais as $material){
		$user = $material['nome_usuario'];
	}
?>

<html>
	<head>
	
	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
	<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
	<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
	
	

		<title>Cella-Perfil</title>
		<style>
			.btn-success {
			  color: #fff;
			  background-color: #28a745;
			  border-color: #28a745;
			}

			.btn-success:hover {
			  color: #fff;
			  background-color: #218838;
			  border-color: #1e7e34;
			  box-shadow: 0 0 6px rgba(35, 173, 278, 1);  
			  
			}

			.btn-success:focus, .btn-success.focus {
			  color: #fff;
			  background-color: #218838;
			  border-color: #1e7e34;
			  box-shadow: 0 0 0 0.2rem rgba(72, 180, 97, 0.5);
			}

			.btn-success.disabled, .btn-success:disabled {
			  color: #fff;
			  background-color: #28a745;
			  border-color: #28a745;
			}

			.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
			.show > .btn-success.dropdown-toggle {
			  color: #fff;
			  background-color: #1e7e34;
			  border-color: #1c7430;
			}

			.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
			.show > .btn-success.dropdown-toggle:focus {
			  box-shadow: 0 0 0 0.2rem rgba(72, 180, 97, 0.5);
			}	
			
			article{
				padding: 15px;
				 border-top: 1px solid #ddd;
			}
			a:link{
				text-decoration:none;
				
			}
			a article:hover {
			  background-color: gray;
			}
			
		</style>
	</head>
	<body>
		<hr>
		<h3 align='center'>Meu Usuário</h3>
		<hr>
		<div class="container" style="width:50%;">
			<div class="row">
				<div class="col-lg-12">
							
							<form action="editar_email.php" method="POST">
							<h3 align="center">Editar email</h3><br><br>
							<div class="col-6" style="border: none;">
							<input type="submit" value="Editar" class="btn-success btn-block btn-lg" style="position: absolute; left: 25%; width: 50%; float: left;"></input>
							</div><br><br><br>
							</form>
							
							<form action="mudar_senhaA.php" method="POST">
							<h3 align="center">Editar senha</h3><br><br>
							<div class="col-6" style="border: none; width: 50%; position: absolute; left: 25%;">
							<input type="submit" href="mudar_senhaA.php" value="Editar" class="btn-success btn-block btn-lg"></input>
							</div><br><br><hr>
							</form>


							<h4 align="center"><b>Nome de usuário</b><br><br><?php
							echo $professor;
							?></h4>
 
				</div>
			</div>
		</div>
			
					<button onclick="goBack()" class="govoltar">
		<span class="glyphicon glyphicon-chevron-left"></span>
		Voltar</button>
			
				
			<div class="footer" style="position: absolute; top: 1000px;">
			<img src="../img/Senai_-_AZUL.jpg" class="imglogo">
			&copy; Copyright 2019 - 2020
			</div>

		
	</body>
</html>