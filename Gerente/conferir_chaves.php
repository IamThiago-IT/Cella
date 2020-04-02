<?php
	include "../conexao.php";
	session_start();
		$id      = $_SESSION['id'];
		$n_sala  = $_SESSION['nome'];
		$medidas = $_SESSION['medidas'];
		$qntde   = $_SESSION['quantidade'];
		$minimo  = $_SESSION['minimo'];
		$rtvl    = $_SESSION['rtvl'];
		$obs     = $_SESSION['obs'];
		$tipo    = $_SESSION['tipo'];
	if($tipo == 2){
		$chama_chaves    = "SELECT * FROM tb_produtos WHERE tipo = 2";		
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute();
		$sql      = "INSERT INTO tb_produtos (id_produto, nome, medidas, qntde, estoque_min, retornavel, obs, tipo) VALUES(?,?,?,?,?,?,?,?)";
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute(array($id,$n_sala,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
		$fusca = NULL;
		unset($_SESSION["id"]);
		unset($_SESSION["nome"]);
		unset($_SESSION["medidas"]);
		unset($_SESSION["quantidade"]);
		unset($_SESSION["minimo"]);
		unset($_SESSION["rtvl"]);
		unset($_SESSION["obs"]);
		unset($_SESSION["tipo"]);
		echo "<script>window.location.href = 'gerente_chaves.php'</script>";
	}
	else{
		$chama_chaves    = "SELECT * FROM tb_produtos WHERE tipo = 3";		
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute();
		$sql      = "INSERT INTO tb_produtos (id_produto, nome, medidas, qntde, estoque_min, retornavel, obs, tipo) VALUES(?,?,?,?,?,?,?,?)";
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute(array($id,$n_sala,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
		$fusca = NULL;
		unset($_SESSION["id"]);
		unset($_SESSION["nome"]);
		unset($_SESSION["medidas"]);
		unset($_SESSION["quantidade"]);
		unset($_SESSION["minimo"]);
		unset($_SESSION["rtvl"]);
		unset($_SESSION["obs"]);
		unset($_SESSION["tipo"]);
		echo "<script>window.location.href = 'gerente_notebooks.php'</script>";
		
	}
?>