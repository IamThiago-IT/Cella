<?php

$id  = $_POST['id_teste'];
		include "../conexao.php";
		$sqlex = "DELETE FROM tb_professores WHERE id_professor = $id";
		$clientes = $fusca -> prepare($sqlex);
		$clientes -> execute();
		$fusca = NULL;
		
		
		?>