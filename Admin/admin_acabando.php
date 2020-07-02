<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$sql      = "SELECT * FROM tb_produtos WHERE tipo=1 AND qntde <= estoque_min";
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute();
		$fusca = NULL;	
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Cadastro de materiais</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<style>
			.tabela{
				position: relative;
				width: 90vw;
				height: 70vh;
				overflow-y: scroll;
				padding:10px;
			}
			h2{
				display:inline-block;
			}
		</style>
   </head>
	<body>
		<main class="principal">
			<div>
				
					<!--Tabela para materiais que estão acabando--->
					<div class="tabela" id="suaDiv">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Lista de Materiais Escassos</h2>
							</div>
							<!-- /.panel-heading -->
							<!--Table-->
							<div class="panel-body">
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>Nome do produto</th>
											<th>Medidas</th>
											<th>Obs</th>
											<th>Quantidade<br>em estoque</th>
											<th>Estoque mínimo</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($materiais as $falta){
											$id_produto = $falta['id_produto'];
											$nome       = $falta['nome'];
											$medidas    = $falta['medidas'];
											$obs        = $falta['obs'];
											$qntde      = $falta['qntde'];
											$minimo     = $falta['estoque_min'];
											echo "<tr><td>$nome</td><td>$medidas</td><td>$obs</td><td>$qntde</td><td>$minimo</td></tr>";
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				
			</div>
		</main>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script src="../bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="../bootstrap/vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>
		<script>
			$(document).ready(function() {
					$('#dataTables-example').DataTable({
						responsive: true
					});
				});
		</script>
	</body>
</html>