<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['msg'])){
    echo "<script>alert('".$_SESSION['msg']."')</script>";
    unset($_SESSION["msg"]);
  	}
?>
<html lang="pt" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Cella">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<title>Cella-login</title>
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- ESTILOS PARA ESTA PÁGINA -->
		<!-- Nesse caso, este estilo é apenas para inserir imagens -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="tradutor.js"></script>
		<link rel="sortcut icon" href="img/icone_cella.jpg" type="image/jpg" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159932240-2"></script>
		<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-159932240-2');
</script>
		<style>
			.botao{background-color: #662b84;color: #fff;border-radius: 25px;border: none;width: 275px;height: 48px;font-size: 15px;font-weight: 600;min-height: 48px;transition: 0.5s;}
			.botao:hover{background-color: #522b84;}
			#google_translate_element {display: none;}
			.goog-te-banner-frame {display: none !important;}
			body {position: static !important;top: 0 !important;}
			.new{position:absolute; top:5px; left:90%; width: 30px;height: 30px;cursor: pointer;}
		</style>
		<script>
		function limite(dado){
				var tam = dado.length;
				if(tam > 5){
					alert('Você atingiu o númeor máximo de caracteres que podem ser digitadas nesse campo');
					document.getElementById("numero").value = dado.substring(0,tam-1);
				}
			}
			
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
	</head>
	<body>
	
		<div class="d-flex justify-content-center align-items-center login-container">
		<div id="google_translate_element" class="boxTradutor"></div>
	 <a href="javascript:trocarIdioma('pt')"><img src="img/br.png" class="band" alt="portugues-br"></a><br>
     <a href="javascript:trocarIdioma('en')"><img src="img/en.png" class="band1" alt="ingles" ></a>
			<!---->
			<i class="fas fa-info-circle new" data-toggle="modal" data-target="#exampleModal"></i>
			<!--img src="img/Cella.png" id="img_circular" LOGO-->
			<form action='conferir_sessao.php' method='POST' autocomplete='off' id="formulario" class="login-form text-center">
				<h3 class="mb-5 font-weight-light text-uppercase"><br>CELLA</h3><hr>
				<h5>sistema de almoxarifado</h5><hr>
				<div class="form-group">
					<input type="text" class="form-control rounded-pill form-control-lg" onkeyup="limite(this.value)" onkeypress='return SomenteNumero(event)' placeholder="Número de matrícula" name='numero' id="numero" style="border: none;" required autofocus>
				</div>
				<div class="form-group">
					<input type="password" class="form-control rounded-pill form-control-lg"  maxlength="16"  placeholder="Senha" name='senha' style="border: none;" required id="senha">
				</div>
				<!--<input type='submit' name='salvar' value='Enviar' class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" ><br>--><!--......Style.css.......-->
				<b><input type='submit' name='salvar' value='Entrar' class="botao text-uppercase btn-block btn mt-5 rounded-pill btn-lg" style="color: #fff;"></b><br>
				<a id="esqsenha" href="esqueceu.php">
					Esqueci minha senha
				</a>
			</form>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
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
		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">O que é o sistema Cella</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        O sistema cella foi criado para ajudar no crontrole de estoque, e sistemas de almoxarifado
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tenha uma ótima experiência</button>
      </div>
    </div>
  </div>
</div>
		<footer class="sticky-footer bg-white"> 
			<div class="container my-auto"> 
				<div class="copyright text-center my-auto">
					<span>Copyright © Your Website 2019</span>
				</div>
			</div>
		</footer>
		

</body>
</html>