<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "menu_perfil.php";

	
	session_start();
	if($_SESSION["abrir"]!="YES"){
		header('location:../index.php');
	}
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero = $_SESSION['numero'];
	$senha = $_SESSION['senha_professor'];
	$tipo = $_SESSION['tipo_usuario'];
	$sql = "SELECT * FROM tipo_user WHERE tipo_usuario = $tipo "; 
	$materiais = $fusca -> prepare($sql);
	$materiais -> execute();
	foreach($materiais as $material){
		$user = $material['nome_usuario'];
	}
?>

<html>
	<head>
	
	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
	<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
	<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
	
	

		<title>Cella-Perfil</title>
		<style>

/* Profile container */
.profile {margin: 20px 0;}
/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fffafa;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}
.profile-usermenu ul li.active a {color: #5b9bd1;background-color: #f6f9fb;border-left: 2px solid #5b9bd1;margin-left: -2px;}
/* Profile Content */
.profile-content{padding: 20px;min-height: 460px;}
		</style>
	</head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
				<br>
				<br>
				<br>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php
						echo $professor;
					?>
					</div>
					<div class="profile-usertitle-job">
						<?php
						echo	 $user;
					?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Dados atuais</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="perfil.php">
							<i class="glyphicon glyphicon-home"></i>
							Perfil </a>
						</li>
						<li class="active">
							<a href="meu_usuario.php">
							<i class="glyphicon glyphicon-user"></i>
							Configurações da conta </a>

						</li>
						<li>
							<a href="editar_email.php"">
							<i class="glyphicon glyphicon-ok"></i>
							E-mail </a>
						</li>
						<li>
							<a href="help.php">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   							<form action="editar_email.php" method="POST">
							<h3 align="center">Editar email</h3><br><br>
							<div class="col-6" style="border: none;">
							<input type="submit" value="Editar" class="btn-success btn-block btn-lg" style="position: absolute; left: 25%; width: 50%; float: left;"></input>
							</div><br><br><br>
							</form>
							
							<form action="mudar_senhaA.php" method="POST">
							<h3 align="center">Editar senha</h3><br><br>
							<div class="col-6" style="border: none; width: 50%; position: absolute; left: 25%;">
							<input type="submit" href="mudar_senhaA.php" value="Editar" class="btn-success btn-block btn-lg"></input>
							</div><br><br><hr>
							</form>


							<h4 align="center"><b>Nome de usuário</b><br><br><?php
							echo $professor;
							?></h4>
            </div>
		</div>
	</div>
</div>
<center>
</center>
<br>
<br>
  </body>
</html>