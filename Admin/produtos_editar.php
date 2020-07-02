<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id'];
	$sql    =  "SELECT * FROM tb_produtos WHERE id_produto = '$id'";
	$prod = $fusca -> prepare($sql);
	$prod -> execute();
	
	foreach($prod AS $bolacha){             //associa os dados do array $prod a valores a partir de $bolacha
		$id_produto   = $bolacha['id_produto'];
		$nome         = $bolacha['nome'];		
		$medidas      = $bolacha['medidas'];	
		$quantidade   = $bolacha['qntde'];					
		$minimo       = $bolacha['estoque_min'];
		$obs          = $bolacha['obs'];
	}
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Editar Produtos</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script>
			function dangerClick(){
			  $.notify({
				// options
				title: '<strong>Erro na edição</strong>',
				message: "<br>Material repetido, cadastro não pode ser concluído.",
			  icon: 'glyphicon glyphicon-remove-sign',
				},{
					// settings
					element: 'body',
					position: null,
					type: "danger",
					allow_dismiss: true,
					newest_on_top: false,
					showProgressbar: false,
					placement: {
						from: "top",
						align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 1031,
					delay: 3300,
					timer: 1000,
					url_target: '_blank',
					mouse_over: null,
					animate: {
						enter: 'animated flipInY',
						exit: 'animated flipOutX'
					},
					onShow: null,
					onShown: null,
					onClose: null,
					onClosed: null,
					icon_type: 'class',
				});
			}
		</script>
		<?php
			if(ISSET($_POST['editar'])){        //se existir um input com o value='editar'{
				//$id         = $_POST["id"];     //associa o input de value='id' a $id e assim por diante...
				$nome1       = $_POST["nome"];
				$minimo1     = $_POST["minimo"];
				$medidas1    = $_POST['medidas'];
				$quantidade1 = $_POST['quantidade'];
				$min1        = $_POST['minimo'];
				$obs1        = $_POST['obs'];
				if($obs1 === ""){
					$obs1 = "-";
				}
				$existe == 0;
				if($nome1 != $nome){
					$conf = "SELECT * FROM tb_produtos WHERE  nome = '$nome1' AND tipo = 1";
					$result = $fusca->prepare($conf);
					$result->execute();
					$existe = $result->rowCount();
				}
				
				if($existe == 0){
					$sql1      = "UPDATE tb_produtos SET   
								nome            = '$nome1',
								estoque_min     = '$minimo1',
								medidas         = '$medidas1',
								qntde           = '$quantidade1',
								estoque_min     = '$min1',
								obs             = '$obs1'
								WHERE
								id_produto = '$id'";		
					$editar = $fusca -> prepare($sql1);
					$editar -> execute(array());
					$fusca = NULL; //encerra conexao com o banco
					$_SESSION['item_salv'] = "successClick();";
					echo "<script>window.location.href = 'admin_materiais.php';</script>";
				}
				else{
					echo "<script>dangerClick();</script>";
				}
			}
		?>
   </head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
					<div class="col-lg-12">
						<form action='' method='POST' autocomplete='off'>
							<b><h1>Editar <?php echo $nome; ?></h1></b><br>
							<div class="form-group col-md-12">
								<label>Nome do material:</label>
								<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéÉáàÁÀíóôÓÍ()" autofocus ><br>
							</div>
							<div class="form-group col-md-12">
								<label>Medidas:</label>
								<input type="text" name="medidas" class="form-control input-lg" value="<?php echo $medidas ;?>"placeholder="Medidas" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéÉáàÁÀíóôÓÍ()" >
							</div>
							<div class="form-group col-md-6">
								<label>Estoque atual:</label>
								<input type='number' min='1' name='quantidade' value="<?php echo $quantidade;?>" class="form-control input-lg" placeholder="Estoque inicial" data-validation="required number"><br>
							</div>
							<div class="form-group col-md-6">
								<label>Estoque mínimo:</label>
								<!--<input type='text' name='minimo' class="form-control input-lg" value='<?php echo $minimo;?>' data-validation="length number" data-validation-length="max1000"><br>-->
								<input type='text' name='minimo' class="form-control input-lg" value='<?php echo $minimo;?>' readonly=“true”><br>
							</div>
							<div class="form-group col-md-12">
								<label>Observações:</label><br>
								<input type="text" name="obs" value="<?php echo $obs;?>" class="form-control input-lg" placeholder="Observações" >
							</div>
							<br>
							<div class="form-group col-md-3">
								<!-- Button trigger modal -->
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
						</form>
					</div>
				</div>
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script>
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
	</body>
</html>		