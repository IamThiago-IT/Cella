<?php
	include "../conexao.php";
	if(isset($_POST['salvar'])){
		$id 		= $_POST['id'];
		$tipo       = $_POST['tipo'];
		$nome       = $_POST['nome'];
		$quantidade = $_POST['quantidade'];
		$id_prof    = $_POST['id_prof'];
		$sql2    =  "SELECT casa FROM tb_professores WHERE id_professor = '$id_prof' ";
		$casa = $fusca->prepare($sql2);
		$casa->execute();
		foreach($casa as $setor){
			$id_casa = $setor['casa'];
		}
		// insere o registro do material na tb_emprestimos
		$sql3 = "INSERT INTO tb_emprestimos (id_emprestimo,fk_professor,fk_produto,data_hora_emprestimo,retornavel,tipo_prod,casa,qntde_emp) VALUES(?,?,?,now(),?,?,?,?)";
		$emp  = $fusca->prepare($sql3);
		$emp->execute(array("",$id_prof,$id ,0,$tipo,$id_casa,$quantidade));
		$last_id = $fusca -> lastInsertId();
			// PEGA A DATA DOS 200 dias anteriores
			$hoje = date('Y/m/d');
			echo "DATA ATUAL: ".$hoje;
			echo "<br>";
			$date=date_create($hoje);
			date_sub($date,date_interval_create_from_date_string("200 days"));
			echo "200 dias atrás: ";
			echo $Ddiferenca = date_format($date,"Y/m/d");
			echo "<br>--------------------------------------------------------------------------------------<br>";
			
			// PARA PEGAR OS REGISTROS A PARTIR DOS 200 DIAS ANTERIORES -> Consumo desde $Ddiferenca
			$sql22 = "SELECT SUM(qntde_emp) as soma FROM tb_historico_emp WHERE fk_produto = '$id' AND (data_hora_devolucao >= '$Ddiferenca') AND retornavel = 0";
			$Consumo = $fusca->prepare($sql22);
			$Consumo->execute();
			foreach($Consumo as $QC){
				$qntde_consumida = $QC['soma'];
			}
			$qntde_consumida = $qntde_consumida + $quantidade;
			echo "A QUANTIDADE CONSUMIDA DESDE ".$Ddiferenca." é: ".$qntde_consumida."<br>";
			echo "<br>--------------------------------------------------------------------------------------<br>";
			
			// PORCENTAGEM 90 dias de 200
			echo $porcentagem = (90/200)*100;
			
			//ESTOQUE MÍNIMO
			$EM = round(($qntde_consumida*$porcentagem)/100);
			echo "<br>--------------------------------------------------------------------------------------<br>";
			echo "O ESTOQUE MÍNIMO DO PRODUTO É: ".$EM;
			echo "<br>";
			
			// desconta a quantidade do produto na tb_produtos
			$sql4 = "SELECT qntde FROM tb_produtos WHERE id_produto = $id";
			$alt = $fusca -> prepare($sql4);
			$alt -> execute();
			foreach($alt as $b){
				$qntde = $b["qntde"];
			}
			$qntde1 = $qntde - $quantidade ;
			$sql5 = "update tb_produtos SET   
						qntde   = ?,
						estoque_min = ?
						WHERE
						id_produto = ?";
			$editar = $fusca -> prepare($sql5);
			$editar -> execute(array($qntde1,$EM,$id));

		// passa o id de tb_emprestimos para tb_historica_emp
		$sql = "DELETE FROM `tb_emprestimos` WHERE `id_emprestimo` = ?";
		$devolucao = $fusca -> prepare($sql);
		$devolucao->execute(array($last_id));
		// redireciona para a página admin_saida.php
		header('Location: colaborador_saida.php');
	}
	
	$fusca = NULL;
?>