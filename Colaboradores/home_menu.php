<!DOCTYPE html>
<?php
	session_start();
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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="../style.css">
		<style>
			.botao{background-color: #662b84;color: #fff;border-radius: 25px;border: none;width: 275px;height: 48px;font-size: 15px;font-weight: 600;min-height: 48px;transition: 0.5s;}
			.botao:hover{background-color: #522b84;}
			#google_translate_element {display: none;}
			.goog-te-banner-frame {display: none !important;}
			.arq{font-size:140%;}
			.logo{position: absolute;top: -5px;width: 150px; height: 85px;}
			.btn-one {color: #000;.bckground-color: #fff;border-color: #000;text-decoration:none;}
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
				</div>
				<div  class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<ul class="nav navbar-nav">																							
						</ul>  
					</ul>
				</div>
			</div>
		</nav>
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
	</body>
</html>