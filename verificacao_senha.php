<?php
	include "conexao.php";
	$chave = $_POST["chave"];
	$numero = $_POST["numero"];
	$sql = "SELECT * FROM `tb_professores` WHERE numero = '$numero'";
	$meu_email= $fusca->prepare($sql);
	$meu_email->execute();
	$existe = $meu_email->rowCount();
	if($existe == 1){
		foreach($meu_email as $mail){
			echo $id=$mail['id_professor'];
			echo "<br>";
			echo $senha=$mail['senha_professor'];
		}
		$chaveCorreta = sha1($id.$senha);
		if($chaveCorreta == $chave){
			echo "<br>";
			echo $nova = md5($_POST["senha"]);
			$sql2 = "UPDATE tb_professores SET
					senha_professor = ?
					WHERE id_professor = ?";
			$senha_atual= $fusca->prepare($sql2);
			$senha_atual->execute(array($nova,$id));
			$fusca = NULL;
			echo "<br>";
			echo "Senha alterada";
		}
		else{
			echo "A chave não bate";
		}
	}
?>