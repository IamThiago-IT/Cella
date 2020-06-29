<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['msg'])){
    echo "<script>alert('".$_SESSION['msg']."')</script>";
    unset($_SESSION["msg"]);
  	}
?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cella-login</title>
    <link rel="stylesheet" href="login.css" />
	<link rel="sortcut icon" href="img/shortcut_cella.png" type="image/png" />
	<script type="text/javascript" src="tradutor.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	<script src="../alertifyjs/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/default.min.css">
	<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/bootstrap.min.css">
  </head>
  	<script>	
	 window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	     gtag('config', 'UA-159932240-2');
	</script>
		<script>
function alert() {
  alertify.confirm("O sistema cella foi criado para ajudar no crontrole de estoque, e sistemas de almoxarifado.",
    function(input) {
      if (input) {
        alertify.success('');
        window.location.href = 'Extras/OnePage';
      } else {
        alertify.error('Cancel');
      }
    });
}
</script>
  <body>	
	<i class="fas fa-info new" onClick="alert();" ></i>
   <div id="google_translate_element" class="boxTradutor"></div>
    <section class="form-section">
      <h1>Cella</h1>
      <div class="form">
        <form action='conferir_sessao.php' method='POST' autocomplete='off' id="formulario">
		 <h4>SISTEMA DE ALMOXARIFADO</h4><hr><br>
		  <div class="cella-block">
            <label for="login-email">Número de Matricula:</label>
            <input type="text" name='numero' id="numero" onkeypress='return SomenteNumero(event)' placeholder="Digite sua matricula" onkeyup="limite(this.value)" autofocus />
          </div>
          <div class="cella-block">
            <label for="login-password">Senha:</label>
			<input type="password" id="senha" name="senha" placeholder="Digite sua senha" aria-describedby="sizing-addon1" >
			</span>
		  </div>			
          <button type="submit" class="btn-cella">Login</button><br>
			<a id="esqsenha" href="esqueceu.php">
				Esqueci minha senha
			</a>
        </form>
      </div>
    </section>
		<ul class="squares"></ul>
		<script src="login.js"></script>	
		
			<div class="dropdown">
			  <span><i class="fas fa-globe-americas new2"></i></span>
			  <div class="dropdown-content">
				<a href="javascript:trocarIdioma('pt')"><img src="img/br.png" class="band" alt="portugues-br">Portugues</a><br>
				<a href="javascript:trocarIdioma('en')"><img src="img/en.png" class="band" alt="ingles" >Ingles</a>
			  </div>
			</div>	
	<div class="footer">
	 <div class="copyright text-center my-auto">
        <span>Copyright © Cella 2020</span>
	 </div>
	 <img src="img/Senai_transp.png" class="imglogo">
    </div>
  </body>
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script>
			function limite(dado){
				var tam = dado.length;
				if(tam > 5){
					alert('Você atingiu o númeor máximo de caracteres que podem ser digitadas nesse campo');
					document.getElementById("numero").value = dado.substring(0,tam-1);
				}
			}
  </script>
  <script>	
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
</html>
