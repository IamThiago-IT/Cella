<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id         =  $_GET['id'];
	$material   =  $_GET['nome'];
	$qntde      =  $_GET['qntde'];
	$minimo     =  $_GET['minimo'];
	$sql    =  "SELECT * FROM tb_professores WHERE tipo_usuario = 3";
	$professor = $fusca->prepare($sql);
	$professor->execute();
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella-Retirada de Materiais</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	</head>
	<body>
		<main class="principal">
			<div>
				<div class="conteudo" id="suaDiv">
					<form action='confirmar_saida.php' method='POST' autocomplete='off'>
						<h1>Retirada de <?php echo $material;?></h1>
						<input type='hidden' name='id' value="<?php echo $id;?>"><br>
						<input type='hidden' name='tipo' value="1">
						<div class="form-group col-md-12">
							<input type='text' class="form-control input-lg" name='nome' readonly=“true” value="<?php echo$material; ?>" ><br>
						</div>
						<div id="estatico">
							<div class="form-group col-md-6">
								<input type="number" name="quantidade" class="form-control input-lg" placeholder="Quantidade que deseja" data-validation="number" data-validation-allowing="range[1;<?php echo $qntde; ?>]" data-validation-error-msg = "O campo está vazio ou digitou um número maior do que a quantidade em estoque."  >
							</div>
							<div class="form-group col-md-6">
								<select name="id_prof" class="form-control input-lg">
									<?php
									foreach($professor as $prof){
										$id_professor = $prof['id_professor'];
										$nome_professor = $prof['nome_professor'];
										echo "<option value=".$id_professor.">".$nome_professor."</option>";
									}
									?>
								</select>
							</div>
						</div>
						<br>
						<input type="submit" value="Salvar" name="salvar">
					</form>
				</div>
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script>
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
	</body>
</html>