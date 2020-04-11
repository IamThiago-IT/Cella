<DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Exemplo de gráfico</title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src="grafico/jquery.js"></script>
		<script type="text/javascript">
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/pegador_note.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_div = document.getElementById('area_grafico');
			var chart_input = document.getElementById('chart_input');
			var chart = new google.visualization.ColumnChart(document.getElementById('area_grafico'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				chart_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/note_mais_pegado.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var note_div = document.getElementById('area_note');
			var note_input = document.getElementById('note_input');
			var chart = new google.visualization.ColumnChart(document.getElementById('area_note'));
			google.visualization.events.addListener(chart, 'ready', function () {
				note_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				note_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });

		  
		</script>
  </head>