<?php
	include "../conexao.php";
	$tipo = $_GET['tipo'];
	if($tipo == 3){
		$sql = "SELECT obs FROM tb_produtos WHERE tipo = 3";
		$resultado = $fusca ->prepare($sql);
		$resultado -> execute();
		foreach($resultado as $resul){
			$obs = $resul['obs'];
			echo "<option value='".$obs."'>".$obs."</option>";
		}
	}
	else{
		$sql2 = "SELECT medidas FROM tb_produtos WHERE tipo = 1 GROUP BY medidas";
		$resultado2 = $fusca ->prepare($sql2);
		$resultado2 -> execute();
		foreach($resultado2 as $resul2){
			$obs2 = $resul2['medidas'];
			echo "<option value='".$obs2."'>".$obs2."</option>";
		}
	}
?>