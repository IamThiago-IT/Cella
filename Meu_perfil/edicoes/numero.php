<?php
	session_start();
	if($_SESSION["abrir"]!="YES"){
		header('location:../../index.php');
	}
	include "../../conexao.php";
	$numero = $_POST['numero'];
	$id   = $_POST['id'];
	$sql3 = "UPDATE tb_professores SET
	numero = ?
	WHERE id_professor = ?";
	$alter_nome = $fusca -> prepare($sql3);
	$alter_nome -> execute(array($numero,$id));
	$_SESSION['numero'] = $numero;
?>