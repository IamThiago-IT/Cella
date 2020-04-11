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
		$sql2  = "UPDATE tb_professores SET
			nome_professor = ?,
			numero         = ?,
			email          = ?,
			tipo_usuario   = ?
		WHERE id_professor = ?";
		$editar  = $fusca -> prepare($sql2);
		$editar -> execute(array($nome_edit,$numero_edit,$email_edit,$tipo_edit,$id_edit));
		echo "<script>window.location.href = 'lista_usuarios.php' </script>";
	}
	
	$fusca =NULL;
	?>
<html lang="pt-br">
	<head>
		<title>Cella- Editar Colaboradores</title>
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
    </head>
	<body>
		<br>
		<br>
		<div class="container" style="width:1000px">
			<div class="row">
				<div class="col-lg-12">
					<form action='' method='POST' autocomplete='off' class="editar">
						<input type="hidden" name="id_prf" value="<?echo $id;?>">
						<h1 align='center'>Editar Colaborador(a) <?php echo $nome; ?></h1>
						<br>
						<div class="form-group">
							<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
								<label>Nome:</label>
								<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome" required autofocus><br>
							</div>
							<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:0px; padding-left:0px; padding-top:0px; padding-down:0px;">
								<label>E-mail:</label><br>
								<input type="text"  class="form-control input-lg" name="email" value="<?php echo $email;?>" required ><br>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
								<label>Número:</label>
								<input type="number" class="form-control input-lg" name="numero" value="<?php echo $numero;?>" required  ><br>
							</div>
							<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:0px; padding-left:0px; padding-top:0px; padding-down:0px;">
								<label>Cargo:</label>
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
						</div>
						<br>
						<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
							Editar
						</button>
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
		</div>
	</body>
</html>