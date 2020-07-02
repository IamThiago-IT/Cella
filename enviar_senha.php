<?php
	session_start();
	include "conexao.php";
	echo $email = $_POST['email'];
	$sql = "SELECT * FROM `tb_professores` WHERE email = '$email'";
	$meu_email= $fusca->prepare($sql);
	$meu_email->execute();
	$existe = $meu_email->rowCount();
	if($existe == 1){
		foreach($meu_email as $mail){
			$id=$mail['id_professor'];
			$senha=$mail['senha_professor'];
		}
		$chave = sha1($id.$senha);
		//echo '<a href="alterar_senha.php?chave='.$chave.'">eletrocarlos.com/alterar_senha.php?chave='.$chave.'</a>';
		$mensagem = 'eletrocarlos.com/alterar_senha.php?chave='.$chave;
		$subject = 'E-mail de confirmação de troca de senha.';
		mail($email,$subject,$mensagem);
		$_SESSION['Enviado']= "trocaEfetuada()";
		header("Location:esqueceu.php");
	}
	else{
		$_SESSION['Enviado']= "trocaFalha()";
		header("Location:esqueceu.php");
	}