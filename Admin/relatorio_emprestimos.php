<!DOCTYPE html>
<?php	
	include 'grafico_chaves.php';
	include "../conexao.php";
	$sql2 = "SELECT tb_historico_emp.*, tb_produtos.*, tb_professores.* FROM tb_historico_emp
	INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto
	INNER JOIN tb_professores ON tb_historico_emp.fk_professor = tb_professores.id_professor
	WHERE tb_historico_emp.tipo_prod = 2 ";
	$historico = $fusca->prepare($sql2);
	$historico->execute();
	
	$fusca = NULL;
?>
<html lang="pt-br">
	<head>
		<title>Relatório de Empréstimos</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
		<link href="../bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	
		<div class="row" style="position:relative; margin-top: 2%; margin-left: 3%; margin-right: 3%;">
		<div class="col-lg-12">
			<h1>Relatório De Chaves</h1>
		</div>
			<div class="col-lg-12" style=" margin-top: 1%;">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Lista de empréstimos</h2>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Produto</th>
									<th>Professor</th>
									<th>Dia e Horário do empréstimodo</th>
									<th>Dia e Horário Devolução</th>
								</tr>
							</thead>
							<tbody>
							<?php
									foreach($historico as $hist){
										$id_hist = $hist['id_emprestimo'];
										$produto_hist = $hist['nome'];
										$professor_hist = $hist['nome_professor'];
										$hora_emp_hist  = $hist['data_hora_emprestimo'];
										$hora_hist_emp      = explode(" ",$hora_emp_hist);
										$data_hist_emp =	explode("-",$hora_hist_emp[0]);
										$hora_dev_hist  = $hist['data_hora_devolucao'];
										$hora_hist_dev      = explode(" ",$hora_dev_hist);
										$data_dev_hist =	explode("-",$hora_hist_dev[0]);
										echo "<tr><td>$produto_hist</td><td>$professor_hist</td><td>$data_hist_emp[2]-$data_hist_emp[1]-$data_hist_emp[0]/ $hora_hist_emp[1] </td><td>$data_dev_hist[2]-$data_dev_hist[1]-$data_dev_hist[0]/ $hora_hist_dev[1] </td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id='area_grafico'></div>
				<div id='area_note'></div>
				<form method="post" action="teste.php">
					<input type="hidden" name="chart_input" id="chart_input">
					<input type="hidden" name="note_input" id="note_input">
			</div>
			<div class="col-lg-12">
				<button style="background-color:Red;" type="submit"><font color="White">Gerar PDF</font></button>
				</form>
			</div>
		</div>
	</body>
</html>