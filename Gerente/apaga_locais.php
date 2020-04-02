<?php

	$id  = $_POST['id_teste'];
		include "../conexao.php";
		$sqlex = "DELETE FROM tb_local WHERE id_local = $id";
		$clientes = $fusca -> prepare($sqlex);
		$clientes -> execute();
		$fusca = NULL;
		
		
?>