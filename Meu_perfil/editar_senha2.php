<!DOCTYPE html>
<?php
	include "menu_perfil.php";
	session_start();
	if($_SESSION["senha"]!="EXISTE"){
		header('location:editar_senha.php');
	}
	$id_professor = $_SESSION['id_professor'];
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilosEdicoes.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cella - Perfil</title>
		<style>
			body{
				height: 100vh;
			}
			.principal{
				height: calc(100vh - 145px);
				padding: 45px;
			}
			.rodape{
				height: 65px;
				background-color: #035e7f;
				display:flex;
				justify-content: center;
				align-items: center;
				font-size: 1.5rem;
				color: #fff;
			}
			.conteudo{
				font-size: 2rem;
			}
			.conteudo{
				position: relative;
				height: calc(100vh - 210px);
				background-color: #fff;
				padding: 10px;
				box-shadow: 0px 4px 15px -2px rgba(0,0,0,0.75);
			}
			.form-control{
				width:15vw;
			}
			.input-group-addon{
				cursor:pointer;
			}
			.erro{color:#ED1C24; margin:0; font-size:15px;}
		</style>
		<script>
			$(document).ready(function() {
				$("p").hide();
				$('#verificar-senha').click(function(){
					//desabilitando o submit do form
					$("form").submit(function () { return false; });
					//atribuindo o valor do campo
					var sSenha1    = $("#senha").val();
					var sSenha2    = $("#senha2").val();
					if(sSenha1 == sSenha2){
						if(sSenha1 == ""|| sSenha1.length < 8){
							$("p").show().removeClass("ok").addClass("erro")
							.text('Por favor, preencha o campo com 8 caracteres ou mais.');
							document.getElementById("senha").style.border = "1px solid #ff0000";
							document.getElementById("senha2").style.border = "1px solid #ff0000";
						}
						else{
							//edicoes/senha.php
							var senha = $("#senha").val();
							var senha2 = $("#senha2").val();
							var id   = $("#id").val();
							alertify.confirm('Salvar nova senha?').set('onok', function(closeEvent){
								$.ajax({
								   url: 'edicoes/senha.php',
								   type: 'POST',
								   data: {senha: senha,senha2: senha2, id: id},
								   error: function() {
									  alert('Something is wrong');
								   },
								   success: function(data){
										window.location.href="perfil.php";
								   }
								});
							} );
						}
					}
					else{
						alertify.error('Error, as senhas não combinam.');
					}
				});
				$('#senha').focus(function(){
					$("p.erro").hide();
					document.getElementById("senha").style.border = "1px solid #ccc";
					document.getElementById("senha2").style.border = "1px solid #ccc";
				});
			});
		</script>
	</head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
					<span style="font-size:4rem; color:#000;" id="voltar" class="glyphicon glyphicon-arrow-left"></span>
					<hr>
					<main class="nomeEditar">
						<form action="#" method="POST">
							<div class="form-group">
								<label>Senha</label>
								<div class="input-group input-group-lg">
									<input type="password" id="senha" class="form-control" name="senha" placeholder="Nova senha" aria-describedby="sizing-addon1" autofocus><span style=" border-radius: 0px 5px 5px 0px;" class="input-group-addon" id="sizing-addon1" onclick="Visualizar()"><span id="olho" class="glyphicon glyphicon-eye-close"></span></span>
									<input type="hidden" id="id" name="id" value="<?php echo $id_professor;?>">
								</div>
								<p></p>
								<small style="font-size:0.7em;" class="form-text text-muted">Coloque uma senha forte, devendo conter no mínimo 8 caracteres.</small>
								<br>
								<br>
								<div class="input-group input-group-lg">
									<input type="password" id="senha2" class="form-control" name="senha2" placeholder="Nova senha" aria-describedby="sizing-addon1"><span style=" border-radius: 0px 5px 5px 0px;" class="input-group-addon" id="sizing-addon1" onclick="Visualizar2()"><span id="olho2" class="glyphicon glyphicon-eye-close"></span></span>
								</div>
							</div>
							<input type="submit" id="verificar-senha" name="enviar" value="Salvar">
						</form>
					</main>
				</div>
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script>
			$(document).ready(function(){
				$("#voltar").click(function(){
					window.location.href = "perfil.php";
				});
			})
			function Visualizar(){ //função para poder ver o que está sendo escrito no campo e mudar também mudar o olho
				var tipo = document.getElementById("senha");
				var classe = document.getElementById("olho");
				if(tipo.type == "password"){
					classe.classList.remove("glyphicon-eye-close"); //glyphicon-eye-open
					classe.classList.toggle("glyphicon-eye-open");
					tipo.type = "text";
				}
				else{
					classe.classList.remove("glyphicon-eye-open");
					classe.classList.toggle("glyphicon-eye-close");
					tipo.type = "password";
				}
			}
			function Visualizar2(){ //função para poder ver o que está sendo escrito no campo e mudar também mudar o olho
				var tp = document.getElementById("senha2");
				var classe2 = document.getElementById("olho2");
				if(tp.type == "password"){
					classe2.classList.remove("glyphicon-eye-close"); //glyphicon-eye-open
					classe2.classList.toggle("glyphicon-eye-open");
					tp.type = "text";
				}
				else{
					classe2.classList.remove("glyphicon-eye-open");
					classe2.classList.toggle("glyphicon-eye-close");
					tp.type = "password";
				}
			}
		</script>
	</body>
</html>