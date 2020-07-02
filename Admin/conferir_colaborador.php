<?php
	include "../conexao.php";
	$id       	 = "";
	$nome 		 = $_POST['nome'];
	$sql2 = "SELECT * FROM tb_professores WHERE '$nome' = nome_professor AND tipo_usuario <> 5";
	$colaborador =  $fusca -> prepare($sql2);
	$colaborador -> execute();
	$exis_col = $colaborador -> rowCount();
	if($exis_col == 1){
		header("HTTP/1.0 404 Not Found");
		header("Status: 404 Not Found");
	}
	else{
		$matri 		 = $_POST['matri'];
		$email 		 = $_POST['email'];
		$verifica    = preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email);
		if($verifica == 1){
			$funcionario = $_POST['funcionario'];
			$senha1      = rand(10000000,100000000);
			$senha       = md5($senha1);
			$sql1 = "SELECT * FROM tb_professores WHERE '$matri' = numero";
			$usuarios =  $fusca -> prepare($sql1);
			$usuarios -> execute();
			$existe = $usuarios -> rowCount();
			if($existe == 1){
				header("HTTP/1.0 404 Not Found");
				header("Status: 404 Not Found");
			}
			else{
				$sql      = "INSERT INTO tb_professores VALUES(?,?,?,?,?,?,NULL,NULL)";	
				$users = $fusca -> prepare($sql);
				$users -> execute(array($id,$nome,$matri,$senha,$email,$funcionario));
				$fusca = NULL;			
				mail($email,"Primeiro e-mail","Oi, tudo bem?\n Você foi convidado a se tornar um colaborador do sistema de gerenciamento de almoxarido CELLA.\n Sua primeira senha é: $senha1");
			}
		}
		else{
			header("HTTP/1.0 404 Not Found");
			header("Status: 404 Not Found");
		}
	}
?>