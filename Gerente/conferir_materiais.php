<?php
		session_start();
		$nome    = $_SESSION['nome'];
		$add     = $_SESSION['save_add'];
		$medidas = $_SESSION['medidas'];
		$obs     = $_SESSION['obs'];
		include "../conexao.php";
		$confere = "SELECT nome FROM tb_produtos WHERE nome = '$nome' AND medidas = '$medidas' AND obs = '$obs'";
		$prod = $fusca -> prepare($confere);
		$prod -> execute();
		$existe = $prod -> rowCount();
		if($existe == 0){
			
			session_start();
			$id      = $_SESSION['id'];
			$nome    = $_SESSION['nome'];
			$medidas = $_SESSION['medidas'];
			$qntde   = $_SESSION['quantidade'];
			$minimo  = $_SESSION['minimo'];
			$rtvl    = $_SESSION['rtvl'];
			$obs     = $_SESSION['obs'];
			$tipo    = $_SESSION['tipo'];
			$sql      = "INSERT INTO tb_produtos (id_produto, nome, medidas, qntde, estoque_min, retornavel, obs, tipo) VALUES(?,?,?,?,?,?,?,?)";		
			$materiais = $fusca -> prepare($sql);
			$materiais -> execute(array($id,$nome,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
			$fusca = NULL; //encerra conexao com o banco
			if($add == "NAO"){
				$_SESSION['item_salv'] = "Item salvo com sucesso!";
				echo "<script>window.location.href = 'gerente_materiais.php';</script>";
			}
			else{
				$_SESSION['item_salv'] = "Item salvo com sucesso!";
				echo "<script>window.location.href = 'gerente_inserir.php';</script>";
			}
		}

		if($existe == 1){	
			session_start();
			$id     = $_SESSION['id'];
			$medidas = $_SESSION['medidas'];
			$qntde  = $_SESSION['quantidade'];
			$obs     = $_SESSION['obs'];
			$nome   = $_SESSION['nome'];
			$sql = "SELECT qntde FROM tb_produtos WHERE nome = '$nome' AND medidas = '$medidas' AND obs = '$obs'";
			$alt = $fusca -> prepare($sql);
			$alt -> execute();
			foreach($alt as $b){
				$quantidade = $b["qntde"];
			}
			$qntde = $qntde +  $quantidade;
			$sql1 = "update tb_produtos SET   
					qntde   = ?
					WHERE
					nome    =  ?
					AND
					medidas = ?
					AND
					obs = ?";
			$editar = $fusca -> prepare($sql1);
			$editar -> execute(array($qntde,$nome,$medidas,$obs));
			$fusca = NULL; //encerra conexao com o banco
			if($add == "NAO"){
				$_SESSION['item_salv'] = "Item salvo com sucesso!";
				header("Location: gerente_materiais.php");
			}
			else{
				$_SESSION['item_salv'] = "Item salvo com sucesso!";
				echo "<script>window.location.href = 'gerente_inserir.php';</script>";
			}
			
			
		}
?>