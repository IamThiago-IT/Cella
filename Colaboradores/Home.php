<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "menu.php";
		
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Home-Cella</title>
	<style>
			.btn-custom1{background-color: #blue ;color: #fff;border-radius: 10px;border: none;width: 275px;height: 48px;font-size: 15px;font-weight: 600;min-height: 48px;transition: 0.5s;}
			.botao:hover{background-color: #522b84;}
			.arq{font-size:140%;}
			.logo{position: absolute;top: -5px;width: 150px; height: 85px;}
			.btn-one {color: #000;.bckground-color: #fff;border-color: #000;text-decoration:none;}
			.btn-icon {padding: 8px;background: #ffffff;}
</style>
</head>
<body>
				<br><br><h3 align="center">Seja bem-vindo  <?php
						echo $professor;
					?></h3><br>
	<a href="Colaboradores_materiais.php" class="btn btn-primary btn-custom1" >
	<span class="fas fa-clipboard-list img-circle text-primary btn-icon"></span>
	Lista de Mateirais
	</a>
</body>
</html>
