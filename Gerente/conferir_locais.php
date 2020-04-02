<?php
	include "../conexao.php";
	$descricao  = $_POST['nome_local'];
	$id 	    = $_POST['id_loc'];
	echo " descrição=".$descricao;
	
	$sql   = "SELECT * FROM tb_local WHERE descricao = '$descricao'";
	$local = $fusca -> prepare($sql);
	$local -> execute();
	$existe  = $local -> rowCount();


	if($existe == 1){
		echo "hrllo";
	}
	else{
		$sql2  = "INSERT INTO tb_local VALUES(?,?) ";
		$locais = $fusca -> prepare($sql2);
		$locais -> execute(array($id,$descricao));
		$fusca = NULL;
		session_start();
		$_SESSION['local'] = "Nova localização cadastrada";
		echo "<script>window.location.href = 'locais_arm.php';</script>";
	}
	
?>