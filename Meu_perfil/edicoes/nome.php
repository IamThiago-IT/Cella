<?php
	session_start();
	if($_SESSION["abrir"]!="YES" && $_SESSION["entrar"]!="YES"){
		header('location:../../index.php');
	}
	include "../../conexao.php";
	$nome = $_POST['nome'];
	$id   = $_POST['id'];
	$sql3 = "UPDATE tb_professores SET
	nome_professor = ?
	WHERE id_professor = ?";
	$alter_nome = $fusca -> prepare($sql3);
	$alter_nome -> execute(array($nome,$id));
	$_SESSION['nome_professor'] = $nome;
?>