<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id']; // id do produto
	$nome   =  $_GET['nome']; // nome do produto
	$tipo   =  $_GET['tipo']; //tipo do produto
	if($tipo == 2){
		$tipo_do_produto ="chave";
	}
	else{
		$tipo_do_produto ="notebook";
	}
	$pagina =  $_GET['pagina'];
	$sql2  =  "SELECT * FROM tb_produtos WHERE id_produto = '$id'";
	$produto = $fusca->prepare($sql2);
	$produto->execute();
	
	$sql    =  "SELECT * FROM tb_professores WHERE tipo_usuario = 3 ORDER BY nome_professor ASC";
	$professor = $fusca->prepare($sql);
	$professor->execute();
	
	foreach($produto as $prod){
		$retur = $prod['retornavel'];
	}
	
	if(isset($_POST['emprestar'])){
		$id_professore  = $_POST['id_prof'];
		$sql2    =  "SELECT casa FROM tb_professores WHERE id_professor = '$id_professore' ";
		$casa = $fusca->prepare($sql2);
		$casa->execute();
		foreach($casa as $setor){
			$id_casa = $setor['casa'];
		}
		$sql3 = "INSERT INTO tb_emprestimos (id_emprestimo,fk_professor,fk_produto,data_hora_emprestimo,retornavel,tipo_prod,casa) VALUES(?,?,?,now(),?,?,?)";
		$emp  = $fusca->prepare($sql3);
		$emp->execute(array("",$id_professore,$id ,$retur,$tipo,$id_casa));
		echo "<script>window.location.href = '$pagina.php'; </script>";
	}
	
	$fusca = NULL;
?>
<html lang="PT-BR">
	<head>
		<title>Empréstimo de chaves</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link href="cadastros.css" rel="stylesheet">
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
					<a href="emprestimos.php"><span style="font-size:4rem; color:#000;" id="voltar" class="glyphicon glyphicon-arrow-left"></span></a>
					<hr>
					<form action='#' method='POST' autocomplete='off'>
						<h1>Empréstimo de <?php echo $tipo_do_produto;?></h1>
						<input type='hidden' name='id' value="<?php echo $id;?>"><br>
						<input type='hidden' name='tipo' value="<?php echo $tipo;?>">
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='nome' readonly=“true” value="<?php echo$nome; ?>" ><br>
						</div>
						<div class="form-group">
						<label>Selecionar Professor</label>
							<select name="id_prof" class="form-control form-control">
								<?php
								foreach($professor as $prof){
									$id_professor = $prof['id_professor'];
									$nome_professor = $prof['nome_professor'];
									echo "<option value=".$id_professor.">".$nome_professor."</option>";
								}
								?>
							</select>
						</div>
						<br>
						<input type="submit" style="width: 48vw;" class=" btn btn-primary btn-lg btn-block" name="emprestar" value="Salvar Empréstimo">
					</form>
				</div>
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
	</body>
</html>		