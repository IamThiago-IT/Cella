<!DOCTYPE html>
<?php
	session_start();
	include "menu.php";
	include "../conexao.php";
	$sql = "SELECT * FROM tb_marca WHERE id_marca <> 3";  // seleciona marca da tabela tb_produtos e guarda no array marc
	$marc = $fusca -> prepare($sql);
	$marc -> execute();
	
	$sql3 = "SELECT * FROM tb_local ORDER BY descricao";
	$loc = $fusca -> prepare($sql3);
	$loc -> execute();
	if(isset($_POST['enviar'])){
		$id       	= $_POST['id'];
		$nome 		= $_POST['nome'];
		if(empty($_POST['marca'])){
			$marca = 3;
		}
		else{
			$marca = $_POST['marca'];
		}
		$medidas    = $_POST['medidas'];
		$quantidade = $_POST['quantidade'];
		if(empty($_POST['minimo'])){
			$minimo     = 0;
		}
		else{
			$minimo     = $_POST['minimo'];
		}
		$rtvl       = $_POST['rtvl'];
		$local      = $_POST['local'];
		if(empty($_POST['obs'])){
			$obs = "-";
		}
		else{
			$obs        = $_POST['obs'];
		}
		$tipo       = 1;
		session_start();
		$_SESSION['id']         = $id;
		$_SESSION['nome']       = $nome;
		$_SESSION['marca']      = $marca;
		$_SESSION['medidas']    = $medidas;
		$_SESSION['quantidade'] = $quantidade;
		$_SESSION['minimo']     = $minimo;
		$_SESSION['rtvl']       = $rtvl;
		$_SESSION['local']      = $local;
		$_SESSION['obs']        = $obs;
		$_SESSION['tipo']        = $tipo;
		$_SESSION["save_add"] = "NAO";
		echo "<script>window.location.href = 'conferir_materiais.php';</script>";
	} 
	if(isset($_POST['enviar_2'])){
		$id       	= $_POST['id'];
		$nome 		= $_POST['nome'];
		if(empty($_POST['marca'])){
			$marca = "-";
		}
		else{
			$marca      = $_POST['marca'];
		}
		$medidas    = $_POST['medidas'];
		$quantidade = $_POST['quantidade'];
		$minimo     = $_POST['minimo'];
		$rtvl       = $_POST['rtvl'];
		$local      = $_POST['local'];
		$obs        = $_POST['obs'];
		$tipo       = 1;
		session_start();
		$_SESSION['id']         = $id;
		$_SESSION['nome']       = $nome;
		$_SESSION['marca']      = $marca;
		$_SESSION['medidas']    = $medidas;
		$_SESSION['quantidade'] = $quantidade;
		$_SESSION['minimo']     = $minimo;
		$_SESSION['rtvl']       = $rtvl;
		$_SESSION['local']      = $local;
		if(empty($_POST['obs'])){
			$obs = "-";
		}
		else{
			$obs        = $_POST['obs'];
		}
		$_SESSION['tipo']       = $tipo;
		$_SESSION["save_add"] = "SIM";
		echo "<script>window.location.href = 'conferir_materiais.php';</script>";
	}

	
	$fusca = NULL;
	?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cadastro de materiais</title>
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
					<form action='#' method='POST' autocomplete='off'>
					<!-- CADASTRO DE MATERIAIS -->
						<h1>Cadastro de Materiais</h1>
						<br>
						<input type='hidden' name='rtvl' value='0'><br>
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='nome' placeholder="Nome" required  autofocus><br>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
								<select name='marca' id="l_marcas" class="form-control input-lg">
									<?php
										foreach($marc as $marca){
											$id_marca = $marca['id_marca'];
											$nome     = $marca['marca'];
											echo "<option value='$id_marca'>".$nome."</option>";
										}
									?>
								</select>
							</div>
						<div class="form-group col-md-6" style="border: none; padding-right: 0px; padding-left:0px; padding-top:0px; padding-down:0px;" >
							<input type="text" name="medidas" class="form-control input-lg" style="height:47px; width:100%; resize:none;" placeholder="Medidas" required>
						</div>
						<a href="#" class="btn-lg success" data-toggle='modal' data-target='#basicModal' style="position: absolute; left: 40px; top: 280px;"><font size="2px">Adicionar marcas</font></a>
						</div>
							<br>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
									<input type='number' min='1' name='quantidade' class="form-control input-lg" placeholder="Estoque inicial" required><br>
								</div>
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:0px; padding-left:0px; padding-top:0px; padding-down:0px;">
									<input type='number' class="form-control input-lg" placeholder="Mínimo" name='minimo'>
									<small class="form-text text-muted">Preencha este campo apenas se existir um estoque mínimo.</small>
								</div>
							</div>
							<label style="position: absolute; left: 50px; top: 420px;">Local de armazenamento:</label>
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;">
										<!--pega da tb_produtos-->
										<select name='local' class="form-control" placeholder="Local de armazenamento">
											<?php				
												foreach($loc AS $e){
													$id_local  = $e['id_local'];
													$descricao = $e['descricao'];
													echo "<option value='$descricao'>$descricao</option>";						
												}		
											?>
										</select>
								</div><br>
							<label style="position: absolute; left: 500px; top: 420px;">Observações:</label><br>
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right: 0px; padding-left:0px; padding-top:0px; padding-down:0px;">
									<input type="text" name="obs" class="form-control" placeholder="Observações">
								</div>
							<br><br>
							<input type="submit" class="btn-primary btn-lg btn-block" name="enviar" value="Salvar">
							<input type="submit" class="btn-default btn-lg btn-block" name="enviar_2" value="Salvar e adicionar outro">
							<!--
							
							<input type="submit" class="btn btn-primary btn-lg btn-block" name="enviar" value="Salvar">
							<input type="submit" class="btn btn-success btn-lg btn-block" name="enviar_2" value="Salvar e adicionar outro">	
							
							-->	
							<p id="mens" style="color:#01A9DB; font-size:20px;" align='center'></p>
					</form>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
		
			<div class="footer" style="position: absolute; top: 1000px;">
			<img src="../img/Senai_-_AZUL.jpg" class="imglogo">
			&copy; Copyright 2019 - 2020
			</div>		
		
	 </body>
	<?php	 if(isset($_SESSION['item_salv'])){
				echo "<script>
				var txt = document.getElementById('mens');
				txt.innerHTML='".$_SESSION['item_salv']."';
				</script>";
				unset($_SESSION["item_salv"]);
			}	
			
			/*if(isset($_POST['adicionar'])){
				include "../conexao.php";
				
				$nova_marca = $_POST['nova_marca'];
				$marca_id = $_POST['id'];
				$sql4     = "INSERT INTO tb_marca VALUES(?,?)";
				$valores = $fusca -> prepare($sql4);
				$valores -> execute(array($marca_id,$nova_marca));
				$fusca = NULL;
				
			}*/
	?>
	<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title' id='myModalLabel'>Adicionar nova marca</h4>
				</div>
				<form action="conferir_marca.php" method="POST">
					<div class='modal-body'>
						<input type="text" name="nova_marca">
						<input type="hidden" name="id_marca">
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
						<input type="submit" class='btn btn-default' name="adicionar" value="adicionar">
					</div>
				</form>
			</div>
		</div>
	</div>
</html>
