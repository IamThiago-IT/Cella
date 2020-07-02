<!DOCTYPE html>
<html lang="pt" dir="ltr">
	<head>
	
		<meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!--meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"-->
		<meta name="author" content="Cella">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="Style/rs.css">
		<script type="text/javascript" src="tradutor.js"></script>
		<title>Cella-Recuperar</title>
		<!-- BOOTSTRAP -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- ESTILOS PARA ESTA PÁGINA -->
		<!-- Nesse caso, este estilo é apenas para inserir imagens -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no"-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="sortcut icon" href="img/icone_cella.jpg" type="image/jpg" />
	</head>
	<body>
	<div id="google_translate_element" class="boxTradutor"></div>
    <section class="form-section">
      <h1>Cella</h1>
      <div class="form-wrapper">
			<form action='enviar_senha.php' method='POST' id="formulario" class="login-form text-center">
				<h5>Esqueceu sua senha?</h5><hr>
				<div class="input-block">
					<label for="login-email">Coloque seu e-mail</label>
					<input type="text" name="email" id="email" data-validation="email" placeholder="Digite seu e-mail" >
				</div>
					Digite seu e-mail, lhe enviaremos um link<p> em seu e-mail para mudar a sua senha.<p>
					<button type="submit" name='salvar' value='Enviar' class="btn-login" style="color: #fff;">Enviar</button>
				<p id="troca"><p/>
        </form>
      </div>
    </section>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
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
		<script>
			$.validate({
				lang : 'pt',
				modules : 'toggleDisabled'
			});
		</script>
		<script>
			function trocaEfetuada(){
				var el = document.getElementById("troca");
				el.innerHTML= "Link Enviado.";
				el.style.color = "#4CAF50";
			}
			function trocaFalha(){
				var el = document.getElementById("troca");
				el.innerHTML= "<b>ERRO</b> <br> E-mail não cadastrado!";
				el.style.color = "#c70000";
			}
		</script>
		<?php
		session_start();
			if(isset($_SESSION['Enviado'])){
				echo "<script>".$_SESSION['Enviado']."</script>";
				unset($_SESSION["Enviado"]);
			}
		?>
		<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>
</html>