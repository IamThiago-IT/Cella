!DOCTYPE html>
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
					<form name="formulario" action="#" method="POST">
					<h3 align="center">Nova Senha</h3><br>
					<input type='password' placeholder="Digite a nova senha" maxlength="16" name="senha" class="form-control input-lg" style="position: absolute; left: 25%; width: 50%; float: left;" required ><br><br><br><br>
					<h3 align="center">Confirmar Senha</h3><br>
					<input type='password' placeholder="Confitme a sua senha" maxlength="16" name="senha" class="form-control input-lg" style=" width: 50%; position: absolute; left: 25%;" required  /><br><br><br><br>
					
					<input type="submit" class="btn-success btn-lg btn-block" onclick="return validar()"  style="border: none; width: 50%; position: absolute; left: 25%;" value="Salvar"/>	
					</form>
				<br><br>
				</div>
			</div>
		</div>	

			<div class="footer" style="position: absolute; top: 1000px;">
			<img src="../img/Senai_-_AZUL.jpg" class="imglogo">
			&copy; Copyright 2019 - 2020
			</div>
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