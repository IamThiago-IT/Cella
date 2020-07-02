<!DOCTYPE html>
<?php
	session_start();
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id'];
	$sql = "SELECT tb_professores.*, casa.* FROM tb_professores INNER JOIN casa ON tb_professores.casa = casa.id_casa WHERE id_professor = '$id'";
	$professores = $fusca->prepare($sql);
	$professores -> execute();
	
	$sql3 = "SELECT * FROM casa";
	$sqlcasa = $fusca->prepare($sql3);
	$sqlcasa -> execute();
	
	foreach($professores as $prof ){
		$nome      = $prof['nome_professor'];
		$numero    = $prof['numero'];
		$casa      = $prof['casa'];
		$nome_casa = $prof['nome_casa'];
	}
	if(isset($_POST['editar'])){
		$nome_edit    = $_POST['nome'];
		$numero_edit  = $_POST['numero'];
		$casa_edit   = $_POST['casa'];
		//confere se o número de matrícula é exitente
		$sql4 = "SELECT numero FROM tb_professores WHERE numero = '$numero_edit' AND tipo_usuario <> 5 AND id_professor <> '$id'";
		$numex = $fusca -> prepare($sql4);
		$numex-> execute();
		$existe = $numex->rowCount();
		//confere so o nome do usuário é existente
		$sql5 = "SELECT nome_professor, id_professor FROM tb_professores WHERE nome_professor = '$nome_edit' AND tipo_usuario <> 5 AND id_professor != $id";
		$nomex = $fusca -> prepare($sql5);
		$nomex-> execute();
		$existeNome = $nomex->rowCount();
		if($existe == 1 || $existeNome == 1){
			echo "<script>alertify.error('Erro, nome de usuário ou número de matrícula já existentes.');</script>";
		}
		else{
			$sql2  = "UPDATE tb_professores SET
				nome_professor = ?,
				numero         = ?,
				casa           = ?
			WHERE id_professor = ?";
			$editar  = $fusca -> prepare($sql2);
			$editar -> execute(array($nome_edit,$numero_edit,$casa_edit,$id));
			$_SESSION['cadas_n'] = "alertify.success('Professor editado com sucesso');";
			echo "<script>window.location.href = 'colaboradores.php' </script>";
		}
	}
	
	$fusca =NULL;
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
   </head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
					<div class="col-lg-12">
					<!--Formulário para cadastro de professores--->
					<form action='#' method='POST' autocomplete='off'>
						<h1 align='left'>Editar Professor(a): <?php echo $nome; ?></h1>
						<br>
						<div class="form-group col-md-12">
							<label>Nome do Usuário:</label>
							<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéêÉáàÁÀíóôÓÍãõÃÕ()"  autofocus><br>
						</div>
						<div class="form-group col-md-6">
							<label>Número de matrícula:</label>
							<input type='number' min='1' name='numero' value="<?php echo $numero;?>" class="form-control input-lg" placeholder="Número de matrícula" data-validation="number length" data-validation-length="4-5" data-validation-allowing="int"><br>
						</div>
						<div class="form-group col-md-6">
							<label>Casa:</label>
							<select class="form-control input-lg" name="casa"><br>
									<?php
										foreach($sqlcasa as $u){
											$id_casa   = $u['id_casa'];
											$toda_casa = $u['nome_casa'];
											if($id_casa  == $casa)
												echo "<option value='$casa' selected>".$nome_casa."</option>";
											else
												echo "<option value='$id_casa'>".$toda_casa."</option>";
										}
									?>
							</select>
						</div>
							<div class="form-group col-md-3" style="border: none; min-height:0px;" >
							<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#exampleModa2">
							  Voltar
							</button>
							</div>
							<!-- Button trigger modal -->
							<div class="form-group col-md-3" style="border: none; min-height:0px;">
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
									Tem certeza de que deseja realizar edição?
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
										<a href="colaboradores.php" class="btn btn-primary btn-lg btn-block">Continuar</a>
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
	</body>	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script>
	$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
	</script>
</html>		