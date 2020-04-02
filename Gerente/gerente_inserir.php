<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";	
	if(isset($_POST['enviar'])){
		$id       	= $_POST['id'];
		$nome 		= $_POST['nome'];
		$medidas    = $_POST['medidas'];
		$quantidade = $_POST['quantidade'];
		if(empty($_POST['minimo'])){
			$minimo     = 0;
		}
		else{
			$minimo     = $_POST['minimo'];
		}
		$rtvl       = $_POST['rtvl'];
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
		$_SESSION['medidas']    = $medidas;
		$_SESSION['quantidade'] = $quantidade;
		$_SESSION['minimo']     = $minimo;
		$_SESSION['rtvl']       = $rtvl;
		$_SESSION['obs']        = $obs;
		$_SESSION['tipo']        = $tipo;
		$_SESSION["save_add"] = "NAO";
		echo "<script>window.location.href = 'conferir_materiais.php';</script>";
	} 
	if(isset($_POST['enviar_2'])){
		$id       	= $_POST['id'];
		$nome 		= $_POST['nome'];
		$medidas    = $_POST['medidas'];
		$quantidade = $_POST['quantidade'];
		if(empty($_POST['minimo'])){
			$minimo     = 0;
		}
		else{
			$minimo     = $_POST['minimo'];
		}
		$rtvl       = $_POST['rtvl'];
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
		$_SESSION['medidas']    = $medidas;
		$_SESSION['quantidade'] = $quantidade;
		$_SESSION['minimo']     = $minimo;
		$_SESSION['rtvl']       = $rtvl;
		$_SESSION['obs']        = $obs;
		$_SESSION['tipo']        = $tipo;
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
		<title>Cella - Cadastro de materiais</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
	<style>
	.botaoazul{color: #fff;background-color: #007bff;border-color: #007bff;	}
	.botaoverde{}
	</style>
	<body>
		<br>
		<br>
		<br>
		<div class="container" style="width:1000px;">
			<div class="row">
				<div class="col-lg-11">
					<form action='#' method='POST' autocomplete='off'>
					<!-- CADASTRO DE MATERIAIS -->
						<h1>Cadastro de Materiais</h1>
						<br>
						<input type='hidden' name='rtvl' value='0'><br>
						<div class="form-group">
							<label>Nome</label>
							<input type='text' class="form-control input-lg" name='nome' placeholder="Nome" required  autofocus><br>
						</div>
						<div class="form-row">
							<label>Medidas</label>
							<input type="text" name="medidas" class="form-control input-lg" placeholder="Medidas" required >
						</div>
							<br>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:2%; padding-left:0px; padding-top:0px; padding-down:0px;" >
									<input type='number' min='1' name='quantidade' class="form-control input-lg" placeholder="Estoque inicial" required ><br>
								</div>
								<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:0px; padding-left:0px; padding-top:0px; padding-down:0px;">
									<input type='number' class="form-control input-lg" placeholder="Mínimo" name='minimo' required >
									<small class="form-text text-muted">Preencha este campo apenas se existir um estoque mínimo.</small>
								</div>
								</div>
								<div class="form-row">
									<input type="text" name="obs" class="form-control input-lg" placeholder="Observações">
								</div>
							<br><br>
							<input type="submit" class="btn-primary btn-lg btn-block" name="enviar" value="Salvar">
							<input type="submit" class="btn-default btn-lg btn-block" name="enviar_2" value="Salvar e adicionar outro">
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
	<?php	 
	session_start();
	if(isset($_SESSION['item_salv'])){
				echo "<script>
				var txt = document.getElementById('mens');
				txt.innerHTML='".$_SESSION['item_salv']."';
				</script>";
				unset($_SESSION["item_salv"]);
			}
	?>
	
</html>
