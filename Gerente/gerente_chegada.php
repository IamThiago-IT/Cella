<!DOCTYPE html>
<?php
	$bic = "SELECT * FROM tb_marca ORDER BY nome_marca";
	include "../conexao.php";
	$marc = $fusca -> prepare($bic);
	$marc -> execute();
	
	
	$sql3 = "SELECT * FROM tb_local ORDER BY descricao";
	$loc = $fusca -> prepare($sql3);
	$loc -> execute();
	$fusca = NULL;
	

	
	if(ISSET($_POST['salvar'])){		
		$id         = "";
		$nome       = $_POST["nome"];
		$marca      = $_POST["marca"];
		$qntde      = $_POST["quantidade"];
		$minimo     = $_POST["minimo"];
		$tipo       = $_POST["tipo"];
		$local      = $_POST["local"];
		$data       = $_POST["data"];
		$validade   = $_POST["validade"];
		
		
		include "../conexao.php";		
		$sql      = "INSERT INTO tb_produtos VALUES(?,?,?,?,?,?,?,?,?)";		
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute(array($id,$nome,$marca,$qntde,$minimo,$local,$tipo,$data,$validade));
		$fusca = NULL; //encerra conexao com o banco
		header("Location: gerente_materiais.php");
		//echo "Dados gravados com sucesso";
		
	}
?>
<html lang="PT-BR">
	 <head>		
		<title>ADD Material</title>	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">	
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">	
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">		
     </head>
	<body>
		<hr>
		<h3 align='center'>Registro da Chegada de Mais Meterial</h3>
		<br>
		<br>

		<hr>
		
	</body>
</html>