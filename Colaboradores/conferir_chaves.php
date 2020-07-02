<?php
	session_start();
	include "../conexao.php";
		$id                  = $_POST['id'];
		$n_sala              = $_POST['nome_sala'];
		$medidas             = $_POST['medidas'];
		$qntde               = $_POST['quantidade'];
		$minimo              = $_POST['minimo'];
		$rtvl                = 1;
		$obs                 = $_POST['obs'];
		$tipo                = 2;
		$chama_chaves    = "SELECT * FROM tb_produtos WHERE nome = '$n_sala' AND tipo =2"; // confere se não há chaves com nome repetido
		$materiais = $fusca -> prepare($chama_chaves);
		$materiais -> execute();
		$existe = $materiais->rowCount();
		if($existe != 1){
			// faz o cadastro chaves
			$sql      = "INSERT INTO tb_produtos (id_produto, nome, medidas, qntde, estoque_min, retornavel, obs, tipo) VALUES(?,?,?,?,?,?,?,?)";
			$materiais = $fusca -> prepare($sql);
			$materiais -> execute(array($id,$n_sala,$medidas,$qntde,$minimo,$rtvl,$obs,$tipo));
			$fusca = NULL;
			$_SESSION['msgMarca'] = "successClick();";
			echo "<script>window.location.href ='Colaboradores_chaves.php'</script>";
		}
		else{
			// manda mensagem de erro
			$_SESSION['msgMarca'] = "dangerClick();";
			echo "<script>window.location.href ='Colaboradores_chaves.php'</script>";
		}
?>