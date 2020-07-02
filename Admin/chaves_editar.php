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
	}
	//confere se o botão submit foi clicado
	if(ISSET($_POST['editar'])){
		$id         = $_POST['id'];
		$nome       = trim($_POST['nome']);
		$sql2    =  "SELECT * FROM tb_produtos WHERE nome = '$nome' AND id_produto <> '$id' ";
		$verificar = $fusca -> prepare($sql2);
		$verificar -> execute();
		$existe= $verificar -> rowCount();
		if($existe == 1){
			echo "<script>alertify.error('Error, nome de sala já existente.');</script>";
		}
		else{
			$sql1      = "update tb_produtos SET 
					nome            = ?
					WHERE
					id_produto = ?";	
			$editar = $fusca -> prepare($sql1);
			$editar -> execute(array($nome,$id));
			$_SESSION['msgMarca'] = "alertify.success('Chave editada com sucesso');";
			echo "<script>window.location.href ='admin_chaves.php'</script>";
			//echo "<script>alertify.success('Ok');</script>";
		}
		$fusca = NULL;	
	}
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Editar Chaves</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
   </head>
	<body>
	<br>
		<br>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
				<div class="col-lg-12">
					<form action='#' method='POST' autocomplete='off'>
						<h1 align='leaf'>Editar Chave de <?php echo $nome; ?></h1>
						<br>
						<input type='hidden' name='id' value="<?php echo $id; ?>">
							<div class="form-group">
								<label>Nome da Sala</label>
								<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome da sala" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéÉáàÁÀíóôÓÍ()"  ><br>
							</div>
							<div class="form-group col-md-3" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
							<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#exampleModa2">
							  Voltar
							</button>
							</div>
							<!-- Button trigger modal -->
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
									<button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Retornar</button>
										<a href="admin_chaves.php" class="btn btn-primary btn-lg btn-block">Continuar</a>
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