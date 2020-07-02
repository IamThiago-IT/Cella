<?php
	session_start();
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
	$confere = "SELECT nome FROM tb_produtos WHERE nome = '$nome_note' AND tipo=3 ";
	$prod = $fusca -> prepare($confere);
	$prod -> execute();
	$existe = $prod -> rowCount();
	if($existe == 0){
		// faz o cadastro de notebooks
		$sql      = "INSERT INTO tb_produtos VALUES(?,?,?,?,?,?,?,?)";		
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute(array($id,$nome_note,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
		$fusca = NULL;
		$_SESSION['msgMarca'] = "successClick();";
		echo "<script>window.location.href ='admin_notebooks.php'</script>";
	}
	else{
		// manda mensagem de erro
		$_SESSION['msgMarca'] = "dangerClick();";
		echo "<script>window.location.href ='admin_notebooks.php'</script>";
	}
?>