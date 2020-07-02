<?php
	include "menu.php";
	include "../conexao.php";
	$sql = "SELECT tb_historico_emp.*, tb_produtos.*, casa.*, tb_professores.*
			FROM tb_historico_emp
			INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto
			INNER JOIN tb_professores ON tb_historico_emp.fk_professor = tb_professores.id_professor
			INNER JOIN casa ON tb_historico_emp.casa = casa.id_casa
			WHERE tb_historico_emp.tipo_prod = 1";
	$saida= $fusca-> prepare($sql);
	$saida->execute();
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Lista de saídas de material</title>
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
			<!--Começo da tabela-->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Registro de retiradas de material</h2>
						</div>
					<!-- /.panel-heading -->
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Material</th>
										<th>Quantidade</th>
										<th>Dia e horário de saída</th>
										<th>Professor</th>
										<th>Casa</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($saida as $retirada){
											$nome        = $retirada['nome'];
											$qntde        = $retirada['qntde_emp'];
											$professor        = $retirada['nome_professor'];
											$casa        = $retirada['nome_casa'];
											
											
											
											$data         = $retirada['data_hora_emprestimo'];
											$hora_hist_emp      = explode(" ",$data);
											// hora
												$horario      = explode(":",$hora_hist_emp[1]);
												$horario[0] = (int) $horario[0];
												$horario[0] = $horario[0]-3;
											
											$data_hist_emp =	explode("-",$hora_hist_emp[0]);
											
											echo "<tr><td>$nome</td><td>$qntde</td><td>$data_hist_emp[2]/$data_hist_emp[1]/$data_hist_emp[0] $horario[0]:$horario[1]:$horario[2]</td><td >$professor</td><td  align=middle>$casa</td></tr>";
										}
									?>
									
								</tbody>
							</table>
						</div>
					<!-- /.panel-body -->
					</div>
				<!-- /.panel -->
				</div>
			</div>
		</main>
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

		<!-- Custom Theme JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script src="js/personalizado.js"></script>
		<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		</script>
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		</script>
		<?php
		session_start();
			if(isset($_SESSION['msgMarca'])){
				echo "<script>".$_SESSION['msgMarca']."</script>";
				unset($_SESSION["msgMarca"]);
			}
		?>
	</body>
</html>