<!DOCTYPE html>
<?php
	include "Style/header.php";
?>
<html lang="pt-br">
	<head>
		<title>Alterar Senha</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="Style/as.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="sortcut icon" href="img/shortcut_cella.png" type="image/png" />
	</head>
	<body>
	<?php
		$chave = "";
		if(isset($_GET['chave'])){
			$chave = $_GET['chave'];
	?>
	<div class="forme">
		<form action="verificacao_senha.php" method="POST">
			<h2>Alterar Senha</h2>
			<input type="hidden" name="chave" value="<?php echo $chave; ?>">
			<div class="group">
			<input type="numero" name="numero" onkeypress='return SomenteNumero(event)' onkeyup="limite(this.value)" required>			
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Número de matrícula</label>
			</div>
			<div class="group">      
			 <input type="password" name="senha" required>
			 <span class="highlight"></span>
			 <span class="bar"></span>
			<label>Senha</label>
		</div>
			<input type="submit" class="btn" value="Nova senha">
		</form>
		<div>
		<?php
		}
		else{
			header("HTTP/1.0 404 Not Found");
		}
		?>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	    <script>
			function limite(dado){
				var tam = dado.length;
				if(tam > 5){
					alert('Você atingiu o númeor máximo de caracteres que podem ser digitadas nesse campo');
					document.getElementById("numero").value = dado.substring(0,tam-1);
				}
			}
  </script>
	  <script>	
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
</html>