<?php
		include "../conexao.php";
		$id       	 = $_POST['id'];
		$nome 		 = $_POST['nome'];
		$email 		 = $_POST['email'];
		$matri 		 = $_POST['matri'];
		//$senha       = $_POST['senha'];
		$senha       = md5($_POST['senha']);
		$funcionario = $_POST['funcionario'];
		$sql1 = "SELECT * FROM tb_professores WHERE '$matri' = numero";
		$usuarios =  $fusca -> prepare($sql1);
		$usuarios -> execute();
		$existe = $usuarios -> rowCount();
		if($existe == 1){
			session_start();
			$_SESSION["mensag"] = "Falha no cadastro. Número de matrícula ou nome do usuario já cadastrados.";
			echo "<script>window.location.href ='gerente_cadastro.php'</script>";
		}
		else{
			$sql      = "INSERT INTO tb_professores VALUES(?,?,?,?,?,?,NULL)";		
			$users = $fusca -> prepare($sql);
			$users -> execute(array($id,$nome,$matri,$senha,$email,$funcionario));
			$_SESSION['item_salv'] = "Novo usuário cadastrado";
			$fusca = NULL;
			echo "<script>window.location.href = 'lista_usuarios.php';</script>";
			/*mail("mariaenegrelli@gmail.com","Primeiro e-mail","Oi, tudo bem?\n Você foi confidado a se tornar um colaborador do sistema de gerenciamento de almoxarido CELLA.\n Sua primeira senha é: $senha");
			*/
		}
		
?>