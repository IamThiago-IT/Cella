<!DOCTYPE html>
<?php	
	include "../conexao.php";
	session_start();
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="estilosEdicoes.css">
		<title>Editar Nome</title>
		<style>
			.erro{color:#ED1C24; margin:0}
			.ok{color:#006633; margin:0} 
		</style>
		<script type="text/javascript">
			$(document).ready(function() {
				$("p").hide();
				$('#verificar-nome').click(function(){
					//desabilitando o submit do form
					$("form").submit(function () { return false; });
					//atribuindo o valor do campo
					var sNome    = $("#nome").val();
					if(sNome == ""){
						$("p").show().removeClass("ok").addClass("erro")
						.text('Por favor, preencha o campo.');
						document.getElementById("nome").style.border = "1px solid #ff0000";
					}
					else{
						var nome = $("#nome").val();
						var id   = $("#id").val();
						
						alertify.confirm('Salvar Nome?').set('onok', function(closeEvent){
							$.ajax({
							   url: 'edicoes/nome.php',
							   type: 'POST',
							   data: {nome: nome, id: id},
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
				$('#nome').focus(function(){
					$("p.erro").hide();
					document.getElementById("nome").style.border = "1px solid #ccc";
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
					<label>Nome</label>
					<input type="text" name="nome" id="nome" class="form-control input-lg"  placeholder="Nome" value='<?php echo $professor;?>'><br>
					<p></p>
				</div>
				<div class="qwe">
					<input type="submit" value="Salvar" id="verificar-nome" value="Salvar" class="btn btn-rad btn-primary">
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
			</script>
	</body>