<?php
	$id = $_POST['id_marca'];
	$nova_marca = $_POST['nova_marca'];
	$ordem = $_POST['ordem'];
	$tipo  = $_POST['inserir'];
	include "../conexao.php";
	$confere = "SELECT marca FROM tb_marca WHERE marca = '$nova_marca'";
	$prod = $fusca -> prepare($confere);
	$prod -> execute();
	$existe = $prod -> rowCount();
	session_start();
	if($existe == 0){
		$sql4     = "INSERT INTO tb_marca VALUES(?,?,?)";
		$valores  = $fusca -> prepare($sql4);
		$valores -> execute(array($marca_id,$nova_marca,$ordem));
		$fusca = NULL;
		$_SESSION['msgMarca'] = "Nova marca cadastrada!";
		if($tipo == 1){
			echo "<script>window.location.href = 'gerente_inserir.php';</script>";
		}
		else{
			echo "<script>window.location.href = 'gerente_notebooks.php';</script>";
			
		}
	}
	else{
		$_SESSION['msgMarca'] = "Falha no cadastro. Marca já existente!";
		echo "<script>window.location.href = 'gerente_inserir.php';</script>";
	}
?>