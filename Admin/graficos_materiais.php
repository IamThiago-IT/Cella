 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src="grafico/jquery.js"></script>
		<script type="text/javascript">
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/pegardados.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_prod = document.getElementById('area_grafico_prod');
			var note_input = document.getElementById('note_input');
			var chart = new google.visualization.ColumnChart(document.getElementById('area_grafico_prod'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_prod.innerHTML = '<img src="' + chart.getImageURI() + '">';
				note_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  
		</script>
		<div id='area_grafico_prod'></div>