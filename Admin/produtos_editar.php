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
	
	if(ISSET($_POST['editar'])){        //se existir um input com o value='editar'{
		//$id         = $_POST["id"];     //associa o input de value='id' a $id e assim por diante...
		$nome1       = $_POST["nome"];
		$minimo1     = $_POST["minimo"];
		$medidas1    = $_POST['medidas'];
		$quantidade1 = $_POST['quantidade'];
		$min1        = $_POST['minimo'];
		$obs1        = $_POST['obs'];
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
		$_SESSION['item_salv'] = "Material editado!";
		echo "<script>window.location.href = 'gerente_materiais.php';</script>";
	}
?>
<html lang="PT-BR">
	<head>
		<title>Cella - Editar Produtos</title>
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
		<br>
		<div class="container" style="width:1000px">
			<div class="row">
				<div class="col-lg-12">
					<form action='' method='POST' autocomplete='off'>
						<h1 align='center'>Editar <?php echo $nome; ?></h1>
						<br>
						<!--<input type='number' name='id' value="<?php //echo $id; ?>">-->
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='nome' value='<?php echo $nome;?>' placeholder="Nome" required  ><br>
						</div>
						<div class="form-row">	
							<label>Medidas:</label>
							<input type="text" name="medidas" class="form-control input-lg" style="height:47px; width:100%; resize:none;"  value="<?php echo $medidas ;?>"placeholder="Medidas" required >
						</div>
							<br>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
								<label>Estoque atual:</label>
								<input type='number' min='1' name='quantidade' value="<?php echo $quantidade;?>" class="form-control input-lg" placeholder="Estoque inicial" required ><br>
								</div>
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:0px; padding-left:0px; padding-top:0px; padding-down:0px;">
									<label>Estoque mínimo:</label>
									<input type='text' name='minimo' class="form-control input-lg" value='<?php echo $minimo;?>'><br>
								</div>
							</div>
							<div class="form-row">
								<label>Observações:</label><br>
								<input type="text" name="obs" value="<?php echo $obs;?>" class="form-control input-lg" placeholder="Observações" required >
							</div>
							<br><br><br>
							<input type="submit" class="btn-default btn-lg btn-block" name="voltar" value="Voltar" >
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