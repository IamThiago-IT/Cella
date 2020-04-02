<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id'];
	$nome   =  $_GET['nome'];
	$tipo   =  $_GET['tipo'];
	$pagina =  $_GET['pagina'];
	$sql2  =  "SELECT * FROM tb_produtos WHERE id_produto = '$id'";
	$produto = $fusca->prepare($sql2);
	$produto->execute();
	
	$sql    =  "SELECT * FROM tb_professores WHERE tipo_usuario = 3";
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
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
	<body>
		<br>
		<br>
		<br>
		<div class="container" style="width:1000px">
			<div class="row">
				<div class="col-lg-12">
				<!-- FORM -->
					<form action='#' method='POST' autocomplete='off'>
						<h1>Empréstimo de chave</h1>
						<br>
						<input type='hidden' name='id' value="<?php echo $id;?>"><br>
						<input type='hidden' name='tipo' value="<?php echo $tipo;?>">
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='nome' readonly=“true” value="<?php echo$nome; ?>" ><br>
						</div>
						<div class="form-group">
							<select name="id_prof">
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
						<input type="submit" class="btn-primary btn-lg btn-block" name="emprestar" value="Salvar Empréstimo">
					</form>
					<!-- FECHA FORM -->
				</div>
			</div>
		</div>
	</body>
	<script>
	$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>
</html>		