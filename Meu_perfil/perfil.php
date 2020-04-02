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
		<title>Cella - Perfil</title>
		<style>
		<!--.button{color:#333;background-color: #fff;border-color: #ccc;position: absolute;left: 255px;top: 660px;	}
			.button:hover {transition: all 0.3s linear; color: #fff;background-color: #035e7f;border-color: #adadad}
			.font{position: absolute;left: 215px;}
			.formulario{widht: 300px;height: 300px;position: absolute;left: 850px;	top: 190px;}
			.line{position: absolute;border-left: 1px solid black;left: 660px;height: 750px;}
			.btn-default1{position: absolute;top: 660px;left: 255px;whidht: 250px;height: 40px;color: #333;background-color: #fff;border-color: #ccc;border-radius: 5px;}
			.btn-default1:hover{background-color: #ccc;border-color: #adadad;}-->
			article{padding: 15px;border-top: 1px solid #ddd;}
			a:link{text-decoration:none;}
			a article:hover {background-color: gray;}
		</style>
	</head>
	<body>
		<hr>
		<h3 align='center'>Meu Perfil</h3>
		<hr>
		<div class="container" style="width:50%;">
			<div class="row">
				<div class="col-lg-12">
				<article>
							<p>Seja bem vindo,   <?php
						echo $professor;
					?></p>
				</article>
					<a href="meu_usuario.php">
						<article>
							<p>Meu usuario</p>
						</article>
					</a>
					<article>
							<p>Cargo:   <?php
						echo	 $user;
					?></p>
					</article>
					<article>
							<p>Número de matricula :   <?php
						echo	 $numero;
					?></p>
					</article>
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