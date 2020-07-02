<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["abrir"]!="YES" && $_SESSION["entrar"]!="OK"){
		header('location:../index.php');
	}
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero = $_SESSION['numero'];
	$tipo = $_SESSION['tipo_usuario'];
	$senha = $_SESSION['senha_professor'];
	$email = $_SESSION['email'];
	$img   = $_SESSION['img'];
	
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="sortcut icon" href="../img/shortcut_cella.png" type="image/png" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="../style.css">
		<script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/default.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/bootstrap.min.css">

		<style>
		
			.arq{font-size:140%;}
			.logo{position: absolute;top: -5px;width: 150px; height: 85px;}
			.btn-one {color: #000;.bckground-color: #fff;border-color: #000;text-decoration:none;}
			

		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Bootstrap Core CSS -->
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button"class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> <!-- Botão do Menu Hamburguer -->
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				  <a class="navbar-brand" href="../Admin/home.php"><img src="../img/logoBandeira.png" class="logo" alt="Logo" title="logo">logo</a> <!-- Logo -->
				</div>
				<div  class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<ul class="nav navbar-nav">
							<li class="arq" id="perfil">
								<a href="#">
								<font color="white" data-toggle="modal" data-target="#exampleModals"><i class="glyphicon glyphicon-home"></i>
								Sair</font> </a>
							</li>
							<!--<li class="arq">
								<a href="meu_usuario.php">
								<font color="white"><i class="glyphicon glyphicon-user"></i>
								Configurações da conta</font></a>
							</li>
							<li class="arq">
								<a href="help.php">
									<font color="white"><i class="glyphicon glyphicon-flag"></i>
									Help </font>
								</a>
							</li>-->
						</ul>  
					</ul>
				</div>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>
		<!-- Modal -->
<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Sair?</h5>
      </div>
      <div class="modal-body">
        Tem certeza que deseja sair?
      </div> 
      <div class="modal-footer">
	  <div class="col-xs-12 col-sm-6">
		<a href="../logout.php" type="button"  class="btn btn-default">Sim</a>
	  </div>
	  <div class="col-xs-12 col-sm-6">
        <a type="button" class="btn btn-default" data-dismiss="modal">Não</a>
      </div>
	  </div>
    </div>
  </div>
</div>
		 <!-- /#page-wrapper -->

		<!-- /#wrapper -->

		<!-- jQuery -->
		<script src="../bootstrap/vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="../bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

		<!-- Custom Theme JavaScript -->

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
										<script>	
    var comboGoogleTradutor = null; //Varialvel global

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'pt',
            includedLanguages: 'en,pt',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');

        comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
    }

    function changeEvent(el) {
        if (el.fireEvent) {
            el.fireEvent('onchange');
        } else {
            var evObj = document.createEvent("HTMLEvents");

            evObj.initEvent("change", false, true);
            el.dispatchEvent(evObj);
        }
    }

    function trocarIdioma(sigla) {
        if (comboGoogleTradutor) {
            comboGoogleTradutor.value = sigla;
            changeEvent(comboGoogleTradutor);//Dispara a troca
        }
    }

		</script>
		  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>
</html>