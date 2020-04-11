<?php
	$id  = $_POST['id_dev'];
	include "../conexao.php";
	$sql = "DELETE FROM tb_emprestimos
		WHERE id_emprestimo = ?
	";
	$devolucao = $fusca -> prepare($sql);
	$devolucao->execute(array($id));
	$fusca= NULL;
?>