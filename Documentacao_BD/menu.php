<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["abrir"]!="YES"){
		header('location:../index.php');
	}
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero = $_SESSION['numero'];
	$tipo = $_SESSION['tipo_usuario'];
?>
<html lang="pt-br">

	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="../style.css">
		<style>
			.arq{font-size:140%;}
			.logo{position: absolute;top: 5px;width: 150px; height: 85px; left:55px;}
			.btn-one {color: #000;.bckground-color: #fff;border-color: #000;text-decoration:none;}
			

		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!--<script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>-->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></script>
		<!-- Bootstrap Core CSS -->
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
		<link href="../bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
		<!-- DataTables CSS -->
		<link href="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="home.php"><img src="../img/logoBandeira.png" class="logo" alt="logo" title="logo"></a> <!-- Logo -->
				</div>
						
							</li>
						</ul>  
					</ul>
				</div>
			</div>
		</nav>


		<br>
	</body>
</html>