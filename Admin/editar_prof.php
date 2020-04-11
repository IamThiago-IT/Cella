<!DOCTYPE html>
<?php
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
		$sql4 = "SELECT numero FROM tb_professores WHERE numero = '$numero_edit' AND id_professor <> '$id'";
		$numex = $fusca -> prepare($sql4);
		$numex-> execute();
		$existe = $numex->rowCount();
		if($existe == 1){
			echo "<script>alert('Número de matrícula já existente');</script>";
		}
		else{
			$sql2  = "UPDATE tb_professores SET
				nome_professor = ?,
				numero         = ?,
				casa           = ?
			WHERE id_professor = ?";
			$editar  = $fusca -> prepare($sql2);
			$editar -> execute(array($nome_edit,$numero_edit,$casa_edit,$id));
			session_start();
			$_SESSION['cadas_n'] = "Professor Editado";
			echo "<script>window.location.href = 'colaboradores.php' </script>";
		}
	}
	
	$fusca =NULL;
	?>
<html lang="PT-BR">
	<head>
		<title>Cella - Editar Professor</title>
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
					<form action='' method='POST' autocomplete='off'>
						<h1 align='center'>Editar Professor <?php echo $nome; ?></h1>
						<br>
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome" required autofocus><br>
						</div>
						<div class="form-row">
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
								<label>Número de matrícula:</label>
								<input type='number' min='1' name='numero' value="<?php echo $numero;?>" class="form-control input-lg" placeholder="Número de matrícula" required ><br>
								</div>
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:0px; padding-left:0px; padding-top:0px; padding-down:0px;">
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
							</div>
							<button type="button" class="btn-default btn-lg btn-block" data-toggle="modal" data-target="#exampleModa2">
							  Voltar
							</button>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
							  Editar
							</button>

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
									<input type="submit" class="btn btn-default btn-lg btn-block" value="Voltar" name="Voltar">
										<a href="colaboradores.php" class="btn btn-primary btn-lg btn-block">Continuar</a>
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