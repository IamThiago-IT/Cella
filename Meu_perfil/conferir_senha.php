<?php
	session_start();
//Nesta página é conferida se a senha digitada existe
	$senha = $_POST['senha'];
	$id    = $_POST['id'];
	$senha = md5($senha);
	include "../conexao.php";
	$sql = "SELECT * FROM tb_professores WHERE id_professor = '$id' AND senha_professor = '$senha'";
	$dados = $fusca -> prepare($sql);
	$dados -> execute();
	$existe = $dados-> rowCount();
	if($existe == 1){
//aqui será o redirecionamento para a página de mudança de senha
		$_SESSION['senha'] = "EXISTE";
		$_SESSION['id']    = $id;
		header('location:editar_senha2.php');
	}
	else{
		$_SESSION['msg'] = "Senha incorreta. Tente novamente.";
		header('location:editar_senha.php');
	}
?>