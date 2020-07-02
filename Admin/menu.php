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
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="sortcut icon" href="../img/shortcut_cella.png" type="image/png" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="../style.css">
		<script src="../Script/tooltip.js"></script>
		<script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/default.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/bootstrap.min.css">
		<style>
			.botao{background-color: #662b84;color: #fff;border-radius: 25px;border: none;width: 275px;height: 48px;font-size: 15px;font-weight: 600;min-height: 48px;transition: 0.5s;}
			.botao:hover{background-color: #522b84;}
			#google_translate_element {display: none;}
			.goog-te-banner-frame {display: none !important;}
			.arq{font-size:140%;}
			.logo{position: absolute;top: -15px;width: 150px; height: 85px;}
			.voltar{position: absolute;top: 45px;
			left:4.5%;
			width: 65px;
			height: 30px;
			color:#fff;
			background-color:#035e7f;border-color:035e7f; border: 1px solid transparent;border-radius: 4px;font-color:#fff;}
			.btn-one {color: #000;.bckground-color: #fff;border-color: #000;text-decoration:none; }
			.go{position: absolute;
			top: 13%;
			left: 4%;
			width: 5%;}
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 100%;
        margin-top: 5px;
        margin-left: -1px;
    }
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!--<script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Bootstrap Core CSS -->
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- DataTables CSS -->
		<link href="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

		<!-- DataTables Responsive CSS -->
		<link href="../bootstrap/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
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
				  <a class="navbar-brand" href="home.php"><img src="../img/logoBandeira.png" class="logo" alt="Logo" title="logo">logo</a> <!-- Logo -->
							<br>
		<a href="javascript:history.back()">
			<button type="button" class="voltar" title="Voltar"> <b>< Voltar</b></button>
		</a>
				</div>
				<div  class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<ul class="nav navbar-nav">
							<li class="arq">
								<!--------Submenu----------->
								
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><font color="white">Controles</font></a>
								<ul class="dropdown-menu">
								
									<li><a href="admin_acabando.php" style="background-color:white;">Insuficientes</a></li>
									<li><a href="entradas.php" style="background-color:white;">Entrada</a></li>
									<li><a href="admin_saida.php"style="background-color:white;">Saída</a></li>
								</ul>
							</li>
							<li class="arq">
								<a href="emprestimos.php" ><font color="white">Empréstimos</font></a>
							</li>						
							<li class="arq">
								<a href="lista_usuarios.php" ><font color="white">Colaboradores</font></a>
							</li>		
							<li class="arq">
								<a href="colaboradores.php"><font color="white">Professores</font></a>
							</li>			
							<li class="arq">
								<!--------Submenu----------->
								
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><font color="white">Materiais</font></a>
								<ul class="dropdown-menu">
								
								
									<li><a href="admin_chaves.php" style="background-color:white;">Chaves</a></li>
									<li><a href="admin_notebooks.php"style="background-color:white;">Notebooks</a></li>
									<li><a href="admin_materiais.php" style="background-color:white;">Materiais</a></li>
								</ul>
							</li>														
								<!------Fim do Submenu------>				
							<li class="arq"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white"><span  class="fas fa-ellipsis-v" title="Nova Função"></span></a>
								<ul class="dropdown-menu">
									<li><a href="../Meu_perfil/perfil.php"style="background-color:white;">Perfil <i class="fas fa-user"></i></a></li>
									<li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Idioma <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:trocarIdioma('pt')" tabindex="-1">Portugues </a></li>
										<li><a href="javascript:trocarIdioma('en')" tabindex="-1">Ingles </a></li>
											</ul>
										  </li>
									<li><a style="background-color:white;" data-toggle="modal" data-target="#exampleModals" href="#">Sair <i class="fas fa-sign-out-alt"></i></a></li>
								</ul>
						
							</li>
						</ul>  
					</ul>
				</div>
			</div>
		</nav>
   <div id="google_translate_element" class="boxTradutor"></div>
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
					    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
		
		 <!-- /#page-wrapper -->

		<!-- /#wrapper -->

		<!-- jQuery -->
		<script src="../bootstrap/vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="../bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<br>
		<br>
		<br>
	</body>
</html>