<?php
		$id  = $_POST['id_teste'];
		$id_professor = $_POST['id_pro'];
		if(isset($id)){
			include "../conexao.php";
			$sqlex = "DELETE FROM tb_professores WHERE id_professor = $id";
			$clientes = $fusca -> prepare($sqlex);
			$clientes -> execute();
		}
		else{
			include "../conexao.php";
			$sql1 = "UPDATE tb_professores SET tipo_usuario = 5  WHERE id_professor = $id_professor";
			$profe = $fusca -> prepare($sql1);
			$profe -> execute();
		}
		
		$fusca = NULL;
	?>