<?php
	session_start();
	if($_SESSION["abrir"]!="YES"){
		header('location:../../index.php');
	}
	include "../../conexao.php";
	$contato = $_POST['contato'];
	$id   = $_POST['id'];
	$sql3 = "UPDATE tb_professores SET
	email = ?
	WHERE id_professor = ?";
	$alter_nome = $fusca -> prepare($sql3);
	$alter_nome -> execute(array($contato,$id));	
	$_SESSION['email'] = $contato;
?>