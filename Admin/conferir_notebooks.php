<?php
	$id                  = $_POST['id'];
	$nome                = $_POST['nome_note'];
	$nome_note = "Notebook-".$nome;
	$medidas             = $_POST['medidas'];
	$qntde               = $_POST['quantidade'];
	$minimo              = $_POST['minimo'];
	$rtvl                = 1;
	$obs                 = $_POST['obs'];
	$tipo                = 3;
	include "../conexao.php";
	$confere = "SELECT nome FROM tb_produtos WHERE nome = '$n_sala' AND tipo=3 ";
	$prod = $fusca -> prepare($confere);
	$prod -> execute();
	$existe = $prod -> rowCount();
	session_start();
	if($existe == 0){
		$sql      = "INSERT INTO tb_produtos VALUES(?,?,?,?,?,?,?,?)";		
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute(array($id,$nome_note,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
		$fusca = NULL;
		$_SESSION['msgMarca'] = "Novo notebooks cadastrado!";
		echo "<script>window.location.href ='gerente_notebooks.php'</script>";
	}
	else{
		echo "wait a minete";
	}
?>