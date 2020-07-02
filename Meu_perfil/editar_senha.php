<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["abrir"]!="YES" && $_SESSION["entrar"]!="OK"){
		header('location:../index.php');
	}
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$email = $_SESSION['email'];
	$incorreto = $_SESSION['msg'];
?> 
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<link rel="sortcut icon" href="../img/icone_cella.jpg" type="image/jpg" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="estilosEdicoes.css">
		<title>Cella - Senha</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Bootstrap Core CSS -->
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- DataTables CSS -->
		<link href="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="../bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="../bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<style>
			body{
				height: 100vh;
				display:flex;
				justify-content:center;
				align-items: center;
				background-color: white;
			}
			.flex-conteiner{
				border: 1px solid lightgray;
				border-radius:10px;
				width:30em;
				
				padding: 20px;
				display:flex;
				flex-direction: column;
				flex-wrap: wrap;
				margin:60px;
			}
			.flex-conteiner .cabeca{
				display:flex;
				flex-direction: column;
				align-items: center;
				justify-content:center;
				text-align:center;
			}
			.flex-conteiner main{
				width:89%;
				padding:10px;
				margin-top:10px;
				margin-left:3px;
				margin-bottom:7em;
				display:flex;
				align-items: baseline;
				justify-content:space-between;
				font-size: 1em;
			}
			.nome{
				font-size:2em;
				padding-down:5px;
			}
			.btn-primary{
				width:10vh;
				font-size:2vh;
			}
			.email{
				border:1px solid lightgray;
				border-radius:20px;
				padding:3px;
			}
			.input-group-addon{
				cursor:pointer;
			}
		</style>
	</head>
	<body>
		<div class="flex-conteiner">
			<div class="cabeca">
				<font style="font-size:3.5em">CELLA</font><!--img src="../img/Cella.png"/-->
				<article class="nome"><?php echo $professor;?></article>
				<article class="email"><?php echo $email;?></article>
				<small style="margin-bottom:15px; margin-top:12px;" class="form-text text-muted">Primeiro confirme que é realmente você, insira sua senha</small>
			</div>
			<form action="conferir_senha.php" method="POST">
				<div class="input-group input-group-lg">
					<input type="password" id="senha" class="form-control" name="senha" placeholder="Digite sua senha" aria-describedby="sizing-addon1" autofocus><span style=" border-radius: 0px 5px 5px 0px;" class="input-group-addon" id="sizing-addon1" onclick="Visualizar()"><span id="olho" class="glyphicon glyphicon-eye-close"></span></span>
					<input type="hidden" name="id" value="<?php echo $id_professor?>">
				</div>
				<center><small style="color:red" class="form-text text-muted"><?php echo $incorreto;?></small></center>
				<main><input type="submit" class="btn btn-primary" value="Enviar"></main>
			</form>
		</div>
		<script>
			function Visualizar(){ //função para poder ver o que está sendo escrito no campo e mudar também mudar o olho
				var tipo = document.getElementById("senha");
				var classe = document.getElementById("olho");
				if(tipo.type == "password"){
					classe.classList.remove("glyphicon-eye-close"); //glyphicon-eye-open
					classe.classList.toggle("glyphicon-eye-open");
					tipo.type = "text";
				}
				else{
					classe.classList.remove("glyphicon-eye-open");
					classe.classList.toggle("glyphicon-eye-close");
					tipo.type = "password";
				}
			}
		</script>
	</body>
	<?php unset($_SESSION["msg"]);?>
</html>