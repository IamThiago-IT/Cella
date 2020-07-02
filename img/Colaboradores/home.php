<!DOCTYPE html>
<?php
	include "../conexao.php";
	session_start();
		
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
	<title>Cella-home</title>
</head>
<body>
	<div class="alert alert-primary" role="alert">
	  Em manutenção, fases de testes
	</div>
		<br><br><h3 align="center">Seja bem-vindo  <?php
						echo $professor;
					?>