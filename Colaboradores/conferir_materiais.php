<?php
		session_start();
		$nome    = $_POST['nome'];
		$medidas = $_POST['medidas'];
		$obs     = $_POST['obs'];
		if($obs === ""){
			$obs = "-";
		}
		$id_professor = $_SESSION['id_professor'];// id do usuário a fazer a entrada
		include "../conexao.php";
		$confere = "SELECT nome FROM tb_produtos WHERE nome = '$nome' AND medidas = '$medidas' AND obs = '$obs' AND tipo = 1";
		$prod = $fusca -> prepare($confere);
		$prod -> execute();
		$existe = $prod -> rowCount();
		// se o material não existir
		if($existe == 0){
			session_start();
			$id      = $_POST['id'];
			$nome    = $_POST['nome'];
			$nome    = htmlentities($nome, ENT_QUOTES, "UTF-8");
			$medidas = $_POST['medidas'];
			$qntde   = $_POST['quantidade'];
			$minimo  = $_POST['minimo'];
			$rtvl    = $_POST['rtvl'];
			$obs     = $_POST['obs'];
			if($obs === ""){
				$obs = "-";
			}
			$tipo    = $_POST['tipo'];
			$sql      = "INSERT INTO tb_produtos (id_produto, nome, medidas, qntde, estoque_min, retornavel, obs, tipo) VALUES(?,?,?,?,?,?,?,?)";		
			$materiais = $fusca -> prepare($sql);
			$materiais -> execute(array($id,$nome,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
			//faz o registro do cadastro
			$last_id = $fusca -> lastInsertId();
			$entrar = "INSERT INTO tb_historico_entrd VALUES (?,?,?,?,now())";
			$salv   = $fusca->prepare($entrar);
			$salv->execute(array("",$last_id,$qntde,$id_professor));
			$fusca = NULL; //encerra conexao com o banco
			//if($add == "NAO"){
			if(isset($_POST['enviar'])){
				$_SESSION['item_salv'] = "successClick();";
				echo "<script>window.location.href ='Colaboradores_materiais.php'</script>";
			}
			else{
				$_SESSION['item_salv'] = "successClick();";
				echo "<script>window.location.href ='Colaboradores_inserir.php'</script>";
			}
		}
		// se o material existir
		if($existe == 1){
			session_start();
			$id      = $_POST['id'];
			$medidas = $_POST['medidas'];
			$qntde   = $_POST['quantidade'];
			$nome    = $_POST['nome'];
			//$nome    = htmlentities($nome);
			$sql = "SELECT id_produto, qntde FROM tb_produtos WHERE nome = '$nome' AND medidas = '$medidas' AND obs = '$obs' AND tipo = 1";
			$alt = $fusca -> prepare($sql);
			$alt -> execute();
			foreach($alt as $b){
				$id_produto = $b["id_produto"];
				$quantidade = $b["qntde"];
			}
			$qntde1 = $qntde +  $quantidade;
			$sql1 = "update tb_produtos SET   
					qntde   = ?
					WHERE
					nome    =  ?
					AND
					medidas = ?
					AND
					obs = ?";
			$editar = $fusca -> prepare($sql1);
			$editar -> execute(array($qntde1,$nome,$medidas,$obs));
			
			$entrar = "INSERT INTO tb_historico_entrd VALUES (?,?,?,?,now())";
			$salv   = $fusca->prepare($entrar);
			$salv->execute(array("",$id_produto,$qntde,$id_professor));
			
			$fusca = NULL; //encerra conexao com o banco
			if(isset($_POST['enviar'])){
				$_SESSION['item_salv'] = "successClick();";
				echo "<script>window.location.href ='Colaboradores_materiais.php'</script>";
			}
			else{
				$_SESSION['item_salv'] = "successClick();";
				echo "<script>window.location.href ='Colaboradores_inserir.php'</script>";
			}
		}
?>