<?php	
	include "../conexao.php";
	session_start();
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$sql1 = "SELECT email FROM `tb_professores` WHERE id_professor = '$id_professor'";
	$email = $fusca -> prepare($sql1);
	$email -> execute();
	
	foreach($email as $e){
		$mail = $e['email'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="estilosEdicoes.css">
		<title>Editar Contatos</title>
		<style>
			.erro{color:#ED1C24; margin:0}
			.ok{color:#006633; margin:0} 
		</style>
		<script type="text/javascript">
		$(document).ready(function() {
			$("p").hide();
			$('#verificar-email').click(function(){
				//desabilitando o submit do form
				$("form").submit(function () { return false; });
				//atribuindo o valor do campo
				var sEmail    = $("#email").val();
				// filtros
				var emailFilter=/^.+@.+\..{2,}$/;
				var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
				// condição
				if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
					$("p").show().removeClass("ok").addClass("erro")
					.text('Por favor, informe um e-mail válido.');
					document.getElementById("email").style.border = "1px solid #ff0000";
				}else{
					//$("p").show().addClass("ok")
					var contato = $("#email").val();
					var id   = $("#id").val();
					alertify.confirm('Salvar novo contato?').set('onok', function(closeEvent){
						$.ajax({
						   url: 'edicoes/contato.php',
						   type: 'POST',
						   data: {contato: contato, id: id},
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
			$('#email').focus(function(){
				$("p.erro").hide();
				document.getElementById("email").style.border = "1px solid #ccc";
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
					<label>Contato</label>
					<input type="text" name="email" id="email" class="form-control input-lg" placeholder="Contato" value='<?php echo $mail;?>'>
					<p></p>
				</div>
				<div class="qwe">
					<input type="submit" value="Salvar" id="verificar-email" value="Salvar" class="btn btn-rad btn-primary">
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
</html>