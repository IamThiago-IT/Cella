<?php
	session_start();
	if($_SESSION["abrir"]!="YES" && $_SESSION["entrar"]!="YES"){
		header('location:../../index.php');
	}
	include "../../conexao.php";
	$senha = $_POST['senha'];
	$senha2 = $_POST['senha2'];
	$id   = $_POST['id'];
	if($senha == $senha2){
		echo $senha_nova = md5($senha);
		$sql8 = "UPDATE tb_professores SET
		senha_professor = ?
		WHERE id_professor = ?";
		$alter_senha= $fusca -> prepare($sql8);
		$alter_senha -> execute(array($senha_nova,$id));
		$_SESSION['senha_professor']= $senha_nova;
		header('location:../perfil.php');
	}
	else{
		echo "naõ DEu";
	}
?>