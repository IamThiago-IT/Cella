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
		<title>Cella - Perfil</title>
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
#yourBtn {
  position: relative;
  top: 10px;
  font-family: calibri;
  width: 150px;
  padding: 10px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border: 1px dashed #BBB;
  text-align: center;
  background-color: #DDD;
  cursor: pointer;
}
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
				<input type="image" style="border-radius: 15px; width:100px; left:25px;" src="https://www.liliamribas.com.br/wp-content/uploads/2016/09/default-user-img.jpg">
				<form action="#type your action here" method="POST" enctype="multipart/form-data" name="myForm">
				  <div id="yourBtn" onclick="getFile()">click to upload a file</div>
				  <!-- this is your file input tag, so i hide it!-->
				  <!-- i used the onchange event to fire the form submission-->
				  <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)" /></div>
				  <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
				  <!-- <input type="submit" value='submit' > -->
				</form>
				
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
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Perfil </a>
						</li>
						<li>
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
			   O resultado aparecera aqui
			   <br><br><br><br>
			   <fieldset disabled>
			   <div class="col-md-6" style="border: none; float: left; max-width: 100%; width: 50%; padding: 10px;">
				<input type="text" id="email" id="disabledFieldsetCheck"  placeholder="<?php
						echo $professor;
					?>" class="form-control input-lg"/><br><br>	
				<input type="text" id="email" id="disabledFieldsetCheck"  placeholder="<?php
						echo $user;
					?>" class="form-control input-lg"/><br><br>	
				<input type="text" id="email" id="disabledFieldsetCheck"  placeholder="<?php
						echo $numero;
					?>" class="form-control input-lg"/><br><br>
				<input type="text" id="email" id="disabledFieldsetCheck"  placeholder="<?php
						echo $email;
					?>" class="form-control input-lg"/><br><br>						
				</div><br><br><br><br>
			 </fieldset>
			</div>
		</div>
	</div>
</div>
<center>
</center>
<br>
<br>
<script>
function getFile() {
  document.getElementById("upfile").click();
}

function sub(obj) {
  var file = obj.value;
  var fileName = file.split("\\");
  document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
  document.myForm.submit();
  event.preventDefault();
}
</script>		
	</body>
</html>