<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>JQuery Validation</title>
		<style type="text/css" media="all">
   body{ font-family:Arial }
   .erro{color:#ED1C24; margin:0}
   .ok{color:#006633; margin:0}    
	</style>
	 
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	   $(document).ready(function() {
		$("p").hide();
		$('#verificar-email').click(function(){
			//desabilitando o submit do form
			$("form").submit(function () { return false; });
			//atribuindo o valor do campo
			var sEmail    = $("#email").val();
			// filtros
			var emailFilter=/^.+@.+\..{2,}$/;
			var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
			// condição
			if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
				$("p").show().removeClass("ok").addClass("erro")
				.text('Por favor, informe um email válido.');
			}else{
				$("p").show().addClass("ok")
				.text('Email informado está correto!');
			}
		});
		$('#email').focus(function(){
			$("p.erro").hide();
		});
	   });    
	</script>
	</head>
	<body>
		<div style="background-color:#CCCCCC;width:275px;padding:10px">
		   <form id="form" name="cadastrese" method="post" action="">
			  Email <input type="text" name="email" id="email"  />
			  <input type="submit" value="EMAIL" id="verificar-email" />        
		   </form>
		</div>
		   <p></p>
	</body>
</html>