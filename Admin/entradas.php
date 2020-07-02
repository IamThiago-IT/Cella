<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$sql = "SELECT tb_historico_entrd.*, tb_produtos.nome, tb_professores.nome_professor
		FROM tb_historico_entrd
		INNER JOIN tb_produtos
		ON tb_historico_entrd.fk_produto = tb_produtos.id_produto 
		INNER JOIN tb_professores ON tb_historico_entrd.fk_professor=tb_professores.id_professor
		ORDER BY id_entrada";
	$entradas = $fusca->prepare($sql);
	$entradas -> execute();
	$fusca = NULL;
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Controle de Entrada</title>
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
		</style>
	</head>
	<body>
		<main class="principal">
			<div>
				<div class="tabela" id="suaDiv">
					<div class="panel panel-default">
						<div class="panel-heading" style="width: 100%;">
							<h2>Controle de Entrada</h2>
						</div>
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Produto</th>
										<th>Quantidade inserida</th>
										<th>Colaborador</th>
										<th>Dia e horário da entrega</th>
									</tr>
								</thead>
								<tbody> 
									<?php
											foreach($entradas as $entr){
												$produto     =$entr['nome'];
												$qntde       =$entr['qntde_ent'];
												$colaborador =$entr['nome_professor'];
												$dia_horario =$entr['data_hora'];
												$hora      = explode(" ",$dia_horario);
												// hora
												$horario      = explode(":",$hora[1]);
												$horario[0] = (int) $horario[0];
												$horario[0] = $horario[0]-3;
												//fim hora
												$data =	explode("-",$hora[0]);
												echo "<tr><td>$produto</td><td>$qntde</td><td>$colaborador</td><td>$data[2]-$data[1]-$data[0] $horario[0]:$horario[1]:$horario[2]</td></tr>";
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

		<!-- Custom Theme JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->

		
	</body>
	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>
</html>