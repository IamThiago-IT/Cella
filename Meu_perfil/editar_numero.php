<!DOCTYPE html>
<?php	
	include "../conexao.php";
	session_start();
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero    = $_SESSION['numero'];
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="estilosEdicoes.css">
		<title>Editar Matrícula</title>
		<style>
			.erro{color:#ED1C24; margin:0}
			.ok{color:#006633; margin:0} 
		</style>
		<script type="text/javascript">
			$(document).ready(function() {
				$("p").hide();
				$('#verificar-numero').click(function(){
					//desabilitando o submit do form
					$("form").submit(function () { return false; });
					//atribuindo o valor do campo
					var sNumero    = $("#numero").val();
					if(sNumero == ""|| sNumero.length < 5){
						$("p").show().removeClass("ok").addClass("erro")
						.text('Por favor, preencha o campo com 5 digitos.');
						document.getElementById("numero").style.border = "1px solid #ff0000";
					}
					else{
						var numero = $("#numero").val();
						var id   = $("#id").val();
						
						alertify.confirm('Salvar Número de Matrícula?').set('onok', function(closeEvent){
							$.ajax({
							   url: 'edicoes/numero.php',
							   type: 'POST',
							   data: {numero: numero, id: id},
							   error: function() {
								  alert('Something is wrong');
							   },
							   success: function(data){
									document.location.reload(true);
							   }
							});
						} );
					}
				});
				$('#numero').focus(function(){
					$("p.erro").hide();
					document.getElementById("numero").style.border = "1px solid #ccc";
				});
			});
		</script>
	</head>
	<body>
		<span style="font-size:4rem; color:#000;" id="voltar" class="glyphicon glyphicon-arrow-left"></span>
		<hr>
		<main class="nomeEditar">
			<form id="form" name="cadastrese" method="post" action="">
				<div class="form-group">
					<label>Número de Matrícula</label>
					<input type="text" name="numero" id="numero" class="form-control input-lg" onkeypress='return SomenteNumero(event)' maxlength="5" placeholder="Número de Matrícula" value='<?php echo $numero;?>'><br>
					<p></p>
				</div>
				<div class="qwe">
					<input type="submit" value="Salvar" id="verificar-numero" value="Salvar" class="btn btn-rad btn-primary">
					<input type="hidden" id="id" name="id" value="<?php echo $id_professor;?>">
				</div>
			</form>
		</main>
			<script>

				$(document).ready(function(){
				  $("#voltar").click(function(){
					$("#suaDiv").load('p_pagina.php');     
				  });
				});
				function SomenteNumero(e){
					var tecla=(window.event)?event.keyCode:e.which;   
					if((tecla>47 && tecla<58))
					  return true;
					else{
						if (tecla==8 || tecla==0) 
						return true;
						else 
						return false;
					}
				}
			</script>
	</body>