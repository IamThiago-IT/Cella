<!DOCTYPE html>
<?php
/*include "../conexao";
	$sql = "SELECT obs FROM tb_produtos WHERE tipo =3 GROUP BY obs";
	$objB = $fusca->prepare($sql);
	$objB -> execute();
	$fusca = NULL;*/
?>
<html lang="pt-br">
	<head>
		<title>Pesquisa</title>
		<meta charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body>
		<h1>PESQUISAS</h1>
		<form action="" method="get">
			<select name="material" id="material">
				<option value="" selected = selected>Selecione uma opção</option>
				<option value="1">Materiais de Aquisição</option>
				<option value="3">Notebooks</option>
			</select>
			<select name="obs" id="obs">
				<option value="" selected = selected>Selecione um curso</option>
			</select>
		</form>
	</body>
	<script>
		$(document).ready(function(){
			$('#material').change(function(){
				$('#obs').load('resultados.php?tipo='+$('#material').val() );
			});
		});
	</script>
</html>