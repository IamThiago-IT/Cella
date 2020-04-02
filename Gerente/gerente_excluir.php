<!DOCTYPE html>
<?php
	session_start();
		if($_SESSION["abrir"]!="YES"){
			header('location:../index.php');
		}
		$id   = $_GET['id'];	
		$tipo = $_GET['tipo'];	
		//$nome = $_GET['name'];	
	include "../conexao.php";
	if(isset($_POST['SIM'])){
		$sql = "DELETE FROM tb_produtos WHERE id_produto = $id";
		$clientes = $fusca -> prepare($sql);
		$clientes -> execute();
		$fusca = NULL;
		if($tipo == 1){
			Header("Location:gerente_materiais.php");
		}
		else{
			if($tipo == 2){
				Header("Location:gerente_chaves.php");
			}
			else{
				Header("Location:gerente_notebooks.php");
			}
		}
		
	}
	if(isset($_POST['NAO'])){
		if($tipo == 1){
			Header("Location:gerente_materiais.php");
		}
		else{
			if($tipo == 2){
				Header("Location:gerente_chaves.php");
			}
			else{
				Header("Location:gerente_notebooks.php");
			}
		}
	}
	
?>
<html lang="pt-br">
	<head>
		<title>Excluir</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	</head>
	<body>
	<!-- CONFIRMAR EXCLUSÃO -->
	<center>
	<h1>Deseja Realmente Excluir <?php echo $id;?></h1>
	<br>
	<hr>
	<br>
		<form action='' method='POST'> 
			<input type='hidden' name='id' value="<?php echo $id; ?>">
			<input type='submit' value='Sim' name='SIM'>
			<input type='submit' value='Não' name='NAO'>
		</form>
	</center>
	</body>
</html>



<?php/*
session_start();
		if($_SESSION["abrir"]!="YES"){
			header('location:../index.php');
		}
	$id   = $_GET['id'];	
	//$nome = $_GET['name'];	
	include "../conexao.php";
		$sql = "DELETE FROM tb_produtos WHERE id_produto = $id";
		$clientes = $fusca -> prepare($sql);
		$clientes -> execute();
		$fusca = NULL;
		Header("Location: gerente_materiais.php");
*/?>
