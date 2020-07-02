<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "menu_perfil.php";
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
		<link rel="sortcut icon" href="../img/shortcut_cella.png" type="image/png" />
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<title>Cella - Perfil</title>
		<style>
			body{
				height: 100vh;
				position: static !important; top: 0 !important;
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
				
			}
			.conteudo{
				position: relative;
				height: calc(100vh - 210px);
				background-color: #fff;
				padding: 10px;
				box-shadow: 0px 4px 15px -2px rgba(0,0,0,0.75);
			}
						  #google_translate_element {display: none;}
			.goog-te-banner-frame {display: none !important;}
				<!-- Estilo na barra de rolagem-->
			::-webkit-scrollbar-track {background-color: #F4F4F4;}
			::-webkit-scrollbar {width: 6px;background: #F4F4F4;}
			::-webkit-scrollbar-thumb {background: #dad7d7;}
		</style>
	</head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
				</div>
				
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script>
			$(window).load(function(){
				$("#suaDiv").load('p_pagina.php');     
			  });
			var url = window.location.href;
			var n = url.includes("https://includefashion.com.br/cella/Meu_perfil/perfil.php");
			if(n == true){
				document.getElementById("perfil").style.backgroundColor = "#023F55";
			}
		</script>
	</body>
</html>