<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "menu_perfil.php";

?>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
	<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
	<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
	
</head>
<style>

</style>
<body>
		<hr>
		<h3 align='center'>Mudar senha</h3>
		<hr>
		<div class="container" style="width:50%;">
			<div class="row">
				<div class="col-lg-12">
					<h3 align="center">Senha atual</h3><br>
					<form name="formulario" action="mudar_senha.php" method="POST">
					<input type='password' maxlength="16" name="senha" min="0" placeholder="Digite a sua senha" class="form-control input-lg" style="position: absolute; left: 25%; width: 50%; float: left;" required  ><br><br>
					<div style="border: none; width: 50%; position: absolute; left: 25%; top: 75%;">
					<input type="submit" onclick="return validar()"  class="btn-success btn-lg btn-block" name="enviar_2" value="Continuar">
					</div>
					</form>
				<br><br><br><br>
				</div>
			</div>
		</div>
			<div class="footer" style="position: absolute; top: 1000px;">
			<img src="../img/Senai_-_AZUL.jpg" class="imglogo">
			&copy; Copyright 2019 - 2020
			</div>
	<script>
	function validar(){
	 var senha = document.formulario.senha;
	 
	  if (document.formulario.senha.value.length < 8) {
           alert("A senha deve conter no minímo 8 digitos!");
           document.formulario.senha.focus();
           return false;
       }
	
	}
	</script>	
</body>
</html>