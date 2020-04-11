<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "menu_home.php";
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
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="">
		<meta name="author" content="">
	<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
	<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
	<title>Cella-Home</title>
</head>
<style>
btn-custom{
	width:5px;
}
.btn-icon {
	padding: 8px;
	background: #ffffff;
}
</style>
<body>
	<div class="container" style="width: 45%;">
	<br><br><h3 align="center">Seja bem-vindo  <?php
						echo $professor;
					?></h3><br>
	<div class="row">
<a href="Admin_materiais.php" class="btn btn-primary btn-custom" >
<span class="fas fa-clipboard-list img-circle text-primary btn-icon"></span>
Lista de materiais
</a>
<a href="emprestimos.php" class="btn btn-primary btn-custom">
<span class="fas fa-list img-circle text-primary btn-icon"></span>
Emprestimos
</a>
<a href="lista_usuarios.php" class="btn btn-primary btn-custom">
<span class="fas fa-users img-circle text-primary btn-icon"></span>
Colaboradores
</a>
<a href="colaboradores.php" class="btn btn-primary btn-custom">
<span class="fas fa-user-friends img-circle text-primary btn-icon"></span>
Professores
</a>
<a href="../Meu_perfil/perfil.php" class="btn btn-primary btn-custom">
<span class="fas fa-user img-circle text-primary btn-icon"></span>
Perfil<font color=red>{Em testes}</font>
</a>
<a href="graficos_tudo.php" class="btn btn-primary btn-custom">
<span class="fas fa-chart-pie img-circle text-primary btn-icon"></span>
Gráficos
</a>
<a href="../CODEQR/qrcode.html" class="btn btn-primary btn-custom">
<span class="fas fa-qrcode img-circle text-primary btn-icon"></span>
QR Code{Em testes}</a>
<a href="../Documentacao_BD/index.php" class="btn btn-primary btn-custom">
<span class="fas fa-search img-circle text-primary btn-icon"></span>
Documentação
</a>
<a href="../logout.php" class="btn btn-primary btn-custom">
<span class="fas fa-sign-out-alt img-circle text-primary btn-icon"></span>
sair
</a>
<br>
<br>
<br>
<br>
<br>
<br>
</div>

<!--Rodapé-->
		<footer class="footerone"> 
					<span>&copy; Copyright 2019 - 2020</span>
		</footer>
<!--Rodapé-->

</body>
</html>