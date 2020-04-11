<?php

		$id  = $_POST['id_teste'];
		include "../conexao.php";
		$sqlex = "UPDATE tb_produtos SET
			tipo = 4
		WHERE id_produto = '$id'";
		$clientes = $fusca -> prepare($sqlex);
		$clientes -> execute();
		$fusca = NULL;
		
		
		?>