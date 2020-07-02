<!DOCTYPE html>
<?php
	include "menu.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Relatórios</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="cadastros.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<style>
			.icon {
			display: block;
			font-size: 36px;
			line-height: 30px;
			margin-bottom: 11px; }
			#divs{
				display:flex;
				align-items: center;
				justify-content:center;
			}
			.caixa{
				display:flex;
				align-items: center;
				justify-content:center;
				flex-direction: column;
				width:350px;
				height:150px;
				border:1px solid #000;
				border-radius:20px;
			}
			.materiais{
				grid-area: materiais;
				
			}
			.notebooks{
				grid-area: notebooks;
				
			}
			.chaves{
				grid-area: chaves;
				
			}
			.insuficientes{
				grid-area: insuficientes;
				
			}
			.entrada{
				grid-area: entrada;
				
			}
			main{
				height:84.4vh;
				display: grid;
				grid-template-columns: 40% 40%;
				grid-template-rows:  1fr 1fr;
				grid-template-areas: 
                    'materiais materiais'
                    'chaves insuficientes'
			}
		</style>
	</head>
	<body>
		<main>
			<div class='materiais' id='divs'>
				<div class='caixa'>
					<span class="icon">
					   <i class="fa fa-list"></i>
					</span>
					<span>Relatório de Materiais</span>
				</div>
				<?php
				$date = new DateTime('00:12:00');
				$date->sub(new DateInterval('PT1H'));
				echo $date->format('h:i:s') . "\n";
				?>
			</div><!--Relatórios de materiais-->
			<div class='notebooks' id='divs'>
				<div class='caixa'>
					<span class="icon">
						<i class="fa fa-key"></i>
					</span>
				</div>
			</div><!--Relatórios de notebooks-->
			<div class='chaves' id='divs'>
				<div class='caixa'>
					<span class="icon">
						<i class="fa fa-key"></i>
					</span>
				</div>
			</div><!--Relatórios de chaves-->
			<div class='insuficientes' id='divs'>
				<div class='caixa'>
					<span class="icon">
						<i class="fa fa-key"></i>
					</span>
				</div>
			</div><!--Relatórios de insuficientes-->
	
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
	</body>
</html>