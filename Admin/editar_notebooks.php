<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id'];
	$sql    =  "SELECT * FROM tb_produtos WHERE id_produto = '$id'";
	$prod = $fusca -> prepare($sql);
	$prod -> execute();
	foreach($prod AS $bolacha){
		$id_produto   = $bolacha['id_produto'];
		$nome         = $bolacha['nome'];	
		$medidas      = $bolacha['medidas'];
		$modelo       = $bolacha['obs'];
		$local        = $bolacha['local'];
	}
	preg_match('/[0-9]+/', $nome, $nome_c);
	if(ISSET($_POST['editar'])){
		$id         = $_POST['id'];
		$nome_novo  = trim($_POST['nome']);
		$nome_note  = "Notebook-".$nome_novo;
		$patrimonio = $_POST['patrimonio'];
		$modelo     = $_POST['modelo'];
		// confere se o nome do notebook já existe
		$sql2    =  "SELECT * FROM tb_produtos WHERE nome = '$nome_note' AND id_produto <> '$id' ";
		$verificar = $fusca -> prepare($sql2);
		$verificar -> execute();
		$existe= $verificar -> rowCount();
		if($existe == 1){
			echo "<script>alertify.error('Error, nome de notebook já existente.');</script>";
		}
		else{
			$sql1      = "update tb_produtos SET 
						nome            = ?,
						medidas         = ?,
						obs				= ?
						WHERE
						id_produto = ?";	
			$editar = $fusca -> prepare($sql1);
			$editar -> execute(array($nome_note,$patrimonio,$modelo,$id));
			$_SESSION['msgMarca'] = "alertify.success('Notebook editado com sucesso');";
			echo "<script>window.location.href = 'admin_notebooks.php';</script>";
		}
		$fusca = NULL;	
	}

?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Editar Produtos</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
   </head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
				<div class="col-lg-12">
					<form action='#' method='POST' autocomplete='off'>
						<h1 align='leaf'>Editar Notebook: <?php echo $nome_c[0]; ?></h1>
						<br>
						<input type='hidden' name='id' value="<?php echo $id; ?>">
							<div class="form-group">
								<label>Número de Série</label>
								<input type='number' min='1' class="form-control input-lg" name='nome' value='<?php echo $nome_c[0];?>' placeholder="Número de série" data-validation="length number" data-validation-length="max3" data-validation-allowing="int" autofocus><br>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
									<label>Modelo</label>
									<input type='text' name='modelo' class="form-control input-lg" value='<?php echo $modelo;?>' placeholder="Medidas" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéÉáàÁÀíóôÓÍ()" >
									<br>
								</div>
								<div class="form-group col-md-6" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
									<label>Número de patrimônio</label>
									<input type='number' name='patrimonio' class="form-control input-lg" value='<?php echo $medidas;?>' placeholder="Número de patrimônio" required  >
								</div>
							</div>
							<div class="form-group col-md-3" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
							<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#exampleModa2">
							  Voltar
							</button>
							<!-- Button trigger modal -->
							</div>
							<div class="form-group col-md-3" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
							  Editar
							</button>
							</div>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Finalizar</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									Tem certeza que quer editar o material?
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Fechar</button>
									<input type="submit" class="btn btn-primary btn-lg btn-block" value="Editar" name="editar">
								  </div>
								</div>
							  </div>
							</div>
							<!--Modal de voltar sem salvar-->
						<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer sair ?</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									O item <?php echo "$nome"?> não será salvo?
								  </div>
								  <div class="modal-footer">
									<input type="submit" class="btn btn-default btn-lg btn-block" value="Voltar" name="Voltar">
										<a href="admin_notebooks.php" class="btn btn-primary btn-lg btn-block">Continuar</a>
								  </div>
								</div>
							  </div>
							</div>							
					</form>
				</div>
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<script>
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
	</body>
</html>