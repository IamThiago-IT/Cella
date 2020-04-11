
<form method="POST" action="https://www.catalogotempario.com.br/json1402">
	Descrição <input type="text" name="descricao" id="descricao" autofocus>
	Modelo <input type="text" name="modelo" id="modelo">
	<button type="submit">Enviar</button>
</form>
<ul id="result"></ul>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
	$("form").submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'https://www.catalogotempario.com.br/json1402',
			data: data,
			success: function(data){
				if(data != false){
					$("#result").html("");
					data = JSON.parse(data);
					data.forEach(function(servico, index, array){
						$("#result").append("<li>"+servico.descricao+" - "+servico.tempo+"</li>");
					});
				}else{
					$("#result").html("");
					$("#result").append("<li>Erro</li>");
				}
			},
			error: function(data, status, error){
				var response = data.responseText;
				response = JSON.parse(response);
				$("#result").html("");
				$("#result").append("<li>"+response.message+"</li>");
			}
		});
	});
</script>