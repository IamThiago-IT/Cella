<?php
		include "../conexao.php";
		$id         =  $_POST['id_professor'];
		$nome       =  $_POST['nome'];
		$numero     =  $_POST['num_matri'];
		$senha      =  $_POST['senha'];
		$email      =  $_POST['email'];
		$tipo       =  $POST['tipo'];
		$casa       =  $_POST['casa'];
		$sql1       =  "SELECT * FROM tb_professores WHERE tipo_usuario = 3 AND nome_professor = '$nome'";
		$prof = $fusca -> prepare($sql1);
		$prof -> execute();
		$existe = $prof -> rowCount();
		if($existe == 1){
			session_start();
			$_SESSION["cadas_n"] = "Professor não pôde ser cadastrado. Nome ou número já existentes.";
			echo "<script>window.location.href = 'colaboradores.php'; </script>";
		}
		else{
			$sql   = "INSERT INTO tb_professores VALUES(?,?,?,?,?,?,?);";
			$users = $fusca -> prepare($sql);
			$users -> execute(array($id,$nome,$numero,$senha,$email,3,$casa));
			$fusca = NULL;
			echo "<script>window.location.href = 'colaboradores.php'; </script>";
		}
?>