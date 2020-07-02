<?php
include "../conexao.php";
// PARA PEGAR A DATA DA ÚLTIMA REPOSIÇÃO
	$sql1 = "SELECT * FROM tb_historico_entrd WHERE id_entrada = (SELECT MAX(id_entrada) FROM tb_historico_entrd WHERE fk_produto = 152)";
	$UR   = $fusca->prepare($sql1);
	$UR->execute();
	foreach($UR as $rpc){
		$reposicao = $rpc['data_hora'];
	}
	$data_hora = explode(" ",$reposicao);
	echo "DATA DA ÚLTIMA REPOSIÇÃO: ";
	echo $DReposicao = $data_hora[0];
	echo "<br>";
	
// PEGA A DATA ATUAL
	$hoje = date('Y/m/d');
	echo "DATA ATUAL: ".$hoje;
	echo "<br>";
	$diferenca = strtotime($hoje) - strtotime($DReposicao);

	//Calcula a diferença em dias
	$dias = floor($diferenca / (60 * 60 * 24));

	echo "A diferença é de $dias dias entre as datas de reposição e hoje<br>";

// PARA PEGAR OS REGISTROS A PARTIR DA ÚLTIMA DATA DE ENTRADA -> Consumo desde a última reposição
	$sql2 = "SELECT SUM(qntde_emp) as soma FROM tb_historico_emp WHERE fk_produto = 152 AND (data_hora_devolucao >= '2020-06-10') AND retornavel = 0";
	$Consumo = $fusca->prepare($sql2);
	$Consumo->execute();
	foreach($Consumo as $QC){
		$qntde_consumida = $QC['soma'];
	}
	echo "A QUANTIDADE CONSUMIDA DESDE ". $DReposicao." é: ".$qntde_consumida."<br>";
// TEMPO DE REPOSIÇÃO = 15 dias
	$TR = 15;
	
//MÉDIA DIÁRIA
	$MD= round($qntde_consumida/$dias);
	echo "A média diária consumida é :".$MD."<br>";

//ESTOQUE MÍNIMO
	$EM = $MD*$TR;
	echo "O ESTOQUE MÍNIMO DO PRODUTO É: ".$EM;
?>