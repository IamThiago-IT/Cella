    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src="grafico/jquery.js"></script>
		<script type="text/javascript">
		//Chaves
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/chaves_emprestadas.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_div = document.getElementById('area_grafico');
			var chart_input = document.getElementById('chart_input');
			var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				chart_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  //materiais
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/pegardados.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_dese = document.getElementById('area_grafico_prod');
			var mat_input = document.getElementById('mat_input');
			var chart = new google.visualization.ColumnChart(document.getElementById('area_grafico_prod'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_dese.innerHTML = '<img src="' + chart.getImageURI() + '">';
				mat_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  //notebooks
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/pegador_note.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var note_div = document.getElementById('area_note');
			var note_input = document.getElementById('note_input');
			var chart = new google.visualization.PieChart(document.getElementById('area_note'));
			google.visualization.events.addListener(chart, 'ready', function () {
				note_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				note_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  //notebooks emprestados
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/note_mais_pegado.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_div = document.getElementById('area_emp');
			var note_emp = document.getElementById('note_emp');
			var chart = new google.visualization.PieChart(document.getElementById('area_emp'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				note_emp.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  //chaves emprestadas
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/chaves_mais_emp.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_div = document.getElementById('area_mais_chaves');
			var chaves_input = document.getElementById('chaves_input');
			var chart = new google.visualization.BarChart(document.getElementById('area_mais_chaves'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				chaves_input.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		  //materiais emprestados
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(function(){
			var json_text = $.ajax({url: "grafico/mais_emprestados.php", dataType:"json", async: false}).responseText;
			var json = eval("(" + json_text + ")");
			var dados = new google.visualization.DataTable(json.dados);
			var chart_div = document.getElementById('area_mais_emp');
			var mais_emp = document.getElementById('mais_emp');
			var chart = new google.visualization.BarChart(document.getElementById('area_mais_emp'));
			google.visualization.events.addListener(chart, 'ready', function () {
				chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				mais_emp.value = chart.getImageURI();
			});
			chart.draw(dados, json.config);
		  });
		</script>