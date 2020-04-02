<!DOCTYPE html>
<?php
	include "menu.php";
	session_start();
	if(isset($_SESSION['mensag'])){
		echo "<script>alert('".$_SESSION['mensag']."')</script>";
		unset($_SESSION["mensag"]);
	}
?>
<html lang="pt-br">
	<head>
		<title>Cella - Cadastro de usuários</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
		<!--   Fundo rosa   <link rel="stylesheet" href="../style.css">   -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script>
			function limite(dado){
				var tam = dado.length;
				if(tam > 5){
					alert('Você atingiu o númeor máximo de caracteres que podem ser digitadas nesse campo');
					document.getElementById("cont_num").value = dado.substring(0,tam-1);
				}
			}
		</script>
	</head>
	<body>
		<br><br><br>
		<div class="container" style=" width:65%;">
			<div class="row">
				<div class="col-sm-12">
					<form name="formulario" action='conferir_colaborador.php' method='POST' autocomplete='off'>
					<!-- CADASTRO DE NOVOS USUÁRIOS -->
						<b><h1 align="">Cadastro de usuários<!-- - <font color="red">Em testes, não usar</font>--></h1></b><br>
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='nome' placeholder="Digite o nome" required  autofocus><br>
						</div>
						<div class="form-group">
							<input type='text' class="form-control input-lg" name='email' placeholder="Digite o e-mail" required ><br>
						</div >
						<div class="form-row">
							<div class="form-group col-md-6" style="border: none; min-height:0px; padding-right:1%; padding-left:0px; padding-top:25px; padding-down:0px;" >
								<input type="number" id="cont_num" onkeyup="limite(this.value)" class="form-control input-lg" name="matri" placeholder="Digite o nº de matrícula" min="0" maxlength="5" required  />
							</div>
							<div class="form-group col-md-6" style="border: none; padding-right:1%; padding-left:0px; padding-top:0px; padding-down:0px;" >
								<label>Selecione o tipo de usuário:</label>
								<select name='funcionario' class="form-control input-lg">
									<option value="2">Administrador</option>
									<option value="1">Colaborador</option>
								</select>
							</div>
								<div class="form-group col-md-3" style="border: none; min-height:0px; padding-right:1%; padding-left:0px; padding-top:5px; padding-down:0px;" >
								Campo provisório Provisório de teste SENHA:<input min="8" maxlength="16" type="password" class="form-control input-lg" name="senha" required >
								</div>
						</div>

						<!-- CADASTRO DE NOVOS USUÁRIOS -->
						<br><br><br>
						<input type="submit"  onclick="return validar()"   class="btn-primary btn-lg btn-block" name="enviar" value="Adicionar Usuário">
					</form>
				</div>
			</div>
		</div>
		
		<button onclick="goBack()" class="govoltar">
		<span class="glyphicon glyphicon-chevron-left"></span>
		Voltar</button>
		
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
