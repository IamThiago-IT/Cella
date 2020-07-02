<!DOCTYPE html>
<?php
	include "menu.php";
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Cadastro de Usuários</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<script>
		/*function confere(numero){
			var tam = numero.length;
			if (!isNaN(numero)) {
				
			}
			else{
				$.notify({
									// options
									title: '<strong>Erro</strong>',
									message: "<br>O campo de número de matrícula só aceita números.",
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
						document.getElementById("cont_num").value = numero.substring(0,tam-1);
			}
		}*/
		</script>
	</head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
					<form name="formulario" action='#' method='POST' autocomplete='off'>
					<!-- CADASTRO DE NOVOS USUÁRIOS -->
						<b><h1>Cadastro de usuários</h1></b><br>
						<div class="form-group col-md-12">
							<label>Nome do Usuário*:</label>
							<input type='text' class="form-control input-lg" name='nome' id="nome" placeholder="Digite o nome" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéêÉáàÁÀíóôÓÍãõÃÕ()"  autofocus><br>
						</div>
						<div class="form-group col-md-12">
							<label>E-mail do usuário*:</label>
							<input type="text" name="email" id="email" class="form-control input-lg"  placeholder="Digite o e-mail" data-validation="email"><br>
						</div>
						<div class="form-group col-md-6">
							<label>Número de matrícula do usuário*:</label>
							<input type="text" id="cont_num" class="form-control input-lg" name="matri" onkeyup="confere(this.value)" placeholder="Digite o nº de matrícula" data-validation="length" data-validation-length="4-5" required>
						</div>
						<div class="form-group col-md-6">						
							<label>Selecione o tipo de usuário*:</label>
							<select name='funcionario' id="funcionario" class="form-control input-lg">
								<option value="2">Administrador</option>
								<option value="1">Colaborador</option>
							</select>
						</div> 
						<!-- CADASTRO DE NOVOS USUÁRIOS -->
						<div class="form-group col-md-3">
						<input type="button" class="btn btn-primary btn-lg btn-block" id="salvar" name="enviar" value="Adicionar Usuário">
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
			$("#salvar").click(function(){
				var nome = $("#nome").val();
				var email = $("#email").val();
				var matri = $("#cont_num").val();
				var funcionario = $("#funcionario").val();
					$.ajax({
					   url: 'conferir_colaborador.php',
					   type: 'POST',
					   data: {nome: nome, matri:matri,email:email,funcionario:funcionario},
					  success: function(data) { 
					   //ativa as notificações
						$.notify({
								// options
								title: '<strong>Usuário salvo com sucesso</strong>',
								message: " ",
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
							setTimeout(function(){window.location.href="lista_usuarios.php";},2000);
						},
						error: function() {
							$.notify({
								// options
								title: '<strong>Erro de salvamento</strong>',
								message: "Número de matrícula ou nome de usuário já existente.<br>Tente novamente.",
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
				});
			});
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
	</body>
</html>
