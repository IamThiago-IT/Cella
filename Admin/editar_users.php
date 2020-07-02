<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id'];
	$sql = "SELECT tb_professores.*, tipo_user.* FROM tb_professores INNER JOIN tipo_user ON tb_professores.tipo_usuario = tipo_user.tipo_usuario WHERE id_professor = '$id'";
	$professores = $fusca->prepare($sql);
	$professores -> execute();
	
	$sql3 = "SELECT * FROM tipo_user WHERE tipo_usuario <> 3";
	$user = $fusca->prepare($sql3);
	$user -> execute();
	
	foreach($professores as $prof ){
		$nome    = $prof['nome_professor'];
		$numero  = $prof['numero'];
		$email   = $prof['email'];
		$tipo    = $prof['tipo_usuario'];
		$nome_tipo = $prof['nome_usuario'];
	}
	if(isset($_POST['editar'])){
		$id_edit      = $_POST['id_prf'];
		$nome_edit    = $_POST['nome'];
		$numero_edit  = $_POST['numero'];
		$email_edit   = $_POST['email'];
		$tipo_edit    = $_POST['tipo_user'];
		// confere se não tem usuário com o mesmo nome
		$sql3 = "SELECT * FROM tb_professores WHERE '$nome_edit' = nome_professor AND tipo_usuario <> 5 AND id_professor <> '$id'";
		$colaborador =  $fusca -> prepare($sql3);
		$colaborador -> execute();
		$exis_col = $colaborador -> rowCount();
		//confere se o número de matrícula é exitente
		$sql4 = "SELECT numero FROM tb_professores WHERE numero = '$numero_edit' AND tipo_usuario <> 5 AND id_professor <> '$id'";
		$numex = $fusca -> prepare($sql4);
		$numex-> execute();
		$existe = $numex->rowCount();
		
		if($exis_col == 1 || $existe == 1){
			echo "<script>alertify.error('Erro, nome de usuário ou número de matrícula já existentes.');</script>";
		}
		else{
			$sql2  = "UPDATE tb_professores SET
				nome_professor = ?,
				numero         = ?,
				email          = ?,
				tipo_usuario   = ?
			WHERE id_professor = ?";
			$editar  = $fusca -> prepare($sql2);
			$editar -> execute(array($nome_edit,$numero_edit,$email_edit,$tipo_edit,$id_edit));
			$_SESSION['cadas_n'] = "alertify.success('Usuário editado com sucesso');";
			echo "<script>window.location.href = 'lista_usuarios.php' </script>";
		}
	}
	
	$fusca =NULL;
	?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Editar Colaboradores</title>
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
					<form action='#' method='POST' autocomplete='off' class="editar">
						<input type="hidden" name="id_prf" value="<?echo $id;?>">
						<h1 align='left'>Editar Colaborador(a) <?php echo $nome; ?></h1>
						<br>
						<div class="form-group">
							<div class="form-group col-md-12">
								<label>Nome:</label>
								<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéêÉáàÁÀíóôÓÍãõÃÕ()"  autofocus><br>
							</div>
							<div class="form-group col-md-12">
								<label>E-mail:</label><br>
								<input type="text" placeholder="E-mail" class="form-control input-lg" name="email" value="<?php echo $email;?>" data-validation="email" ><br>
							</div>
						</div>
						<br>
						<div class="form-group col-md-6">
							<label>Número de matrícula do usuário:</label>
							<input type="number" placeholder="Número de matrícula" class="form-control input-lg" name="numero" value="<?php echo $numero;?>" data-validation="number length" data-validation-length="4-5" data-validation-allowing="int" ><br>
						</div>
						<div class="form-group col-md-6">
							<label>Selecione o tipo de usuário:</label>
								<select class="form-control input-lg" name="tipo_user" ><br>
								<?php
									foreach($user as $u){
										$id_tipo  = $u['tipo_usuario'];
										$nome_usuario = $u['nome_usuario'];
										if( $tipo  == $id_tipo)
											echo "<option value='$tipo' selected>".$nome_tipo."</option>";
										elseif($id_tipo == 5)
											'nada';
										else
											echo "<option value='$id_tipo'>".$nome_usuario."</option>";
									}
								?>
								</select>
						</div>
						<br>
						<!------>
						<div class="form-group col-md-6">
							<input type="button" class="btn btn-primary btn-lg btn-block" id="salvar" name="enviar" value="Salvar" data-toggle="modal" data-target="#exampleModal">
						</div>
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
									<input type="submit" class="btn btn-primary" name="editar" Value="Editar">
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
		<script>
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
	</body>
</html>