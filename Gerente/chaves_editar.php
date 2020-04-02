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
	if(ISSET($_POST['editar'])){
		$id         = $_POST['id'];
		$nome       = $_POST['nome'];
		$sql1      = "update tb_produtos SET 
					nome            = ?
					WHERE
					id_produto = ?";	
		$editar = $fusca -> prepare($sql1);
		$editar -> execute(array($nome,$patrimonio,$modelo,$id));
		$_SESSION['item_salv'] = "Chave editada!";
		echo "<script>window.location.href = 'gerente_chaves.php';</script>";
		$fusca = NULL;	
	}
?>
<html lang="PT-BR">
	<head>
		<title>Editar - Produtos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
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
		<div class="container" style="width:1000px">
			<div class="row">
				<div class="col-lg-12">
					<form action='#' method='POST' autocomplete='off'>
						<h1 align='center'>Editar Chave de <?php echo $nome; ?></h1>
						<br>
						<input type='hidden' name='id' value="<?php echo $id; ?>">
							<div class="form-group">
								<label>Nome da Sala</label>
								<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Número de série" required  ><br>
							</div>
							<input type="submit" class="btn-default btn-lg btn-block" name="voltar" value="voltar" >
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
	</body>
</html>