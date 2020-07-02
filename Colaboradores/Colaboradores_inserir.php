<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";	
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Cadastro de materiais</title>
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
					<!--Formulário para cadastro de material--->
					<form action='conferir_materiais.php' method='POST' autocomplete='off'>
						<div class="inputs">
							<div>
								<h1>Cadastro de Materiais</h1>
								<br>
								<div class="form-group col-md-12">
									<label>Nome do Material</label>
									<input type='text' class="form-control input-lg" name='nome' id="nome" placeholder="Nome" data-validation="required alphanumeric" data-validation-ignore="._    /çÇéÉáàÁÀíóôÓÍ()"  autofocus><br>
								</div>
								<div class="form-group col-md-12">
									<label>Medidas</label>
									<input type="text" name="medidas" id="medidas" class="form-control input-lg" placeholder="Medidas" data-validation="required">
								</div>
								<div class="form-group col-md-6">
									<label>Estoque inicial</label>
									<input type='number' name='quantidade' id="quantidade" class="form-control input-lg" onkeyup="contador()" placeholder="Estoque inicial" data-validation="required number"><br>
								</div>
								<div class="form-group col-md-6" >
									<label>Estoque mínimo</label>
									<input type='number' class="form-control input-lg" placeholder="Mínimo" name='minimo' id="minimo" onkeyup="contador()" readonly=“true”>
									<!--<input type='number' class="form-control input-lg" placeholder="Mínimo" name='minimo' id="minimo" onkeyup="contador()" data-validation="length number" data-validation-length="max1000" readonly=“true”>-->
								</div>
								<div class="form-group col-md-12">
									<input type="text" name="obs" id="obs" class="form-control input-lg" placeholder="Observações">
								</div>
								<input type='hidden' name='rtvl' class="rtvl" value='0'><br>
								<input type='hidden' name='tipo' class="tipo" value='1'>
								<div class="form-group col-md-3" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
									<input type="submit" class="btn btn-primary btn-lg btn-block col-md-3" name="enviar" id="salvar" value="Salvar">
								</div>
								<div class="form-group col-md-3" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
									<input type="submit" class=" btn btn-default btn-lg btn-block col-md-3" name="enviar_2" onclick="addsalv()" value="Salvar e adicionar outro">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script>
			//Confere o número de caracteres dos campos Estoque inicial e Estoque minímo
			function contador(){
				var minimo = document.getElementById("minimo").value;
				var maximo = document.getElementById("quantidade").value;
				var tam = minimo.length;
				let mi = Number(minimo);
				let mx = Number(maximo);
				if(mi > mx){
							$.notify({
									// options
									title: '<strong>Erro</strong>',
									message: "<br>O estoque mínimo tem quer ser menor que o estoque inicial.",
								  icon: 'glyphicon glyphicon-warning-sign',
								},{
								// settings
								element: 'body',
								//position: null,
								type: "warning",
								//allow_dismiss: true,
								//newest_on_top: false,
								showProgressbar: false,
								placement: {
									from: "top",
									align: "right"
								},
								offset: 20,
								spacing: 10,
								z_index: 1031,
								delay: 300,
								timer: 1000,
								url_target: '_blank',
								mouse_over: null,
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutRight'
								},
								onShow: null,
								onShown: null,
								onClose: null,
								onClosed: null,
								icon_type: 'class',
							});
						document.getElementById("minimo").value = minimo.substring(0,tam-1);
				}
			}
		</script>
		<script>
		//alert
			function successClick(){
				  $.notify({
					// options
					title: '<strong>Material salvo com sucesso</strong>',
					message: "",
				  icon: 'glyphicon glyphicon-ok',
					url: 'https://github.com/mouse0270/bootstrap-notify',
					target: '_blank'
				},{
					// settings
					element: 'body',
					//position: null,
					type: "success",
					//allow_dismiss: true,
					//newest_on_top: false,
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
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutRight'
					},
					onShow: null,
					onShown: null,
					onClose: null,
					onClosed: null,
					icon_type: 'class',
				});
			}
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
		<?php
			session_start();
			if(isset($_SESSION['item_salv'])){
				echo "<script>".$_SESSION['item_salv']."</script>";
				unset($_SESSION["item_salv"]);
			}
		?>
	</body>
</html>
