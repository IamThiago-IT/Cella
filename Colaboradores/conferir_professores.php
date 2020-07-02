<?php
		include "../conexao.php";
		$id         =  $_POST['id'];
		$nome       =  $_POST['nome'];
		$numero     =  $_POST['numero'];
		$senha      =  $_POST['senha'];
		$email      =  $_POST['email'];
		//$tipo       =  $POST['tipo'];
		$casa       =  $_POST['casa'];
		//confere se professor já está cadastrado
		$sql1       =  "SELECT * FROM tb_professores WHERE tipo_usuario = 3 AND nome_professor = '$nome'";
		$prof = $fusca -> prepare($sql1);
		$prof -> execute();
		$existe = $prof -> rowCount();
		// confere se número de matrícula já está cadastrado
		$sql2       =  "SELECT * FROM tb_professores WHERE tipo_usuario <> 5 AND numero = '$numero'";
		$num = $fusca -> prepare($sql2);
		$num -> execute();
		$n_existe = $num -> rowCount();
		if($existe == 1 || $n_existe == 1){
			session_start();
			$_SESSION["cadas_n"] = "dangerClick();";
			echo "<script>window.location.href= 'colaboradores.php'</script>";
		}
		else{
			$sql   = "INSERT INTO tb_professores VALUES(?,?,?,?,?,?,?,NULL);";
			$users = $fusca -> prepare($sql);
			$users -> execute(array($id,$nome,$numero,$senha,$email,3,$casa));
			$fusca = NULL;
			session_start();
			$_SESSION["cadas_n"] = "successClick();";
			echo "<script>window.location.href= 'colaboradores.php'</script>";
		}
?>