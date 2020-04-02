<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$sql = "SELECT tb_emprestimos.*, tb_produtos.*, tb_professores.*
	FROM tb_emprestimos INNER JOIN tb_produtos ON tb_emprestimos.fk_produto = tb_produtos.id_produto
	INNER JOIN tb_professores ON tb_emprestimos.fk_professor=tb_professores.id_professor
	WHERE tb_emprestimos.retornavel = 1";
	$emprestimo = $fusca->prepare($sql);
	$emprestimo->execute();
	
	$sql2 = "SELECT tb_historico_emp.*, tb_produtos.*, tb_professores.* FROM tb_historico_emp
	INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto
	INNER JOIN tb_professores ON tb_historico_emp.fk_professor = tb_professores.id_professor";
	$historico = $fusca->prepare($sql2);
	$historico->execute();
	
	$fusca = NULL;
?>
<html lang="pt-br">
	<head>
	<title>Lista de Empréstimos</title>
		<meta charset="utf-8">
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
		<style>
			.glyphicon-duplicate{font-size:30px;color:#000;}
		</style>
	</head>
	<body>
		<div class="row" style="position:relative; margin-top: 2%; margin-left: 3%; margin-right: 5%;">
			<div class="col-lg-12" style=" margin-top: 5%;">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Lista de empréstimos - Em manuteção</h2>
							<a href='relatorio_emprestimos.php' style="width: 25px; height: 25px; position: relative; left:95%; top: -50px" title="Gerar Relatório de Empréstimo de Chaves"><span aria-hidden="true" class="glyphicon glyphicon-duplicate"></span></a>
							<a href='relatorio_notebooks.php' style="width: 25px; height: 25px; position: relative; left:95%; top: -30px" title="Gerar Relatório de Empréstimo de Notebooks"><span aria-hidden="true" class="glyphicon glyphicon-duplicate"></span></a>
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
									<th>Devolução</th>
								</tr>
							</thead>
							<tbody>
				
							
								<?php
									foreach($emprestimo as $emp){
										$id_emp = $emp['id_emprestimo'];
										$produto = $emp['nome'];
										$professor = $emp['nome_professor'];
										$hora_emp  = $emp['data_hora_emprestimo'];
										$hora      = explode(" ",$hora_emp);
										$data =	explode("-",$hora[0]);
										$dev  = $emp['data_hora_devolucao'];

										$devolucao = "<a id='devolver' href='#' aria-hidden='true' data-id='$id_emp' data-target='$produto' title='Marca devolução de $produto?' ><span style='width:30px; height:30px;' class='glyphicon glyphicon-check' aria-hidden='true'></span></a>";
	
										echo "<tr><td>$produto</td><td>$professor</td><td>$data[2]-$data[1]-$data[0] $hora[1]</td><td>-----</td><td>$devolucao</td></tr>";
									}
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
				  <!-- /#page-wrapper -->
		 <!-- /#wrapper -->

		<!-- jQuery -->
		<!--<script src="../bootstrap/vendor/jquery/jquery.min.js"></script> -->

		<!-- Bootstrap Core JavaScript -->
	   <!-- <script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>-->

		<!-- Metis Menu Plugin JavaScript -->
		<script src="../bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="../bootstrap/vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>

		<!-- Custom Th e JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		</script>
			<div class="footer" style="position: absolute; top: 1000px;">
			<img src="../img/Senai_-_AZUL.jpg" class="imglogo">
			&copy; Copyright 2019 - 2020
			</div>
</body>
	<script>
    $("a#devolver").click(function(){
			var id = $(this).attr("data-id");
			var nome = $(this).attr("data-target");
			if(confirm('Completar devolução ?'+ nome))
			{
				$.ajax({
				   url: 'devolucao.php',
				   type: 'POST',
				   data: {id_dev: id},
				   error: function() {
					  alert('Something is wrong');
				   },
				   success: function(data) {
						$("#"+id).remove(); 
						 location.reload();
				   }
				});
			}
		});
	</script>
</html>
