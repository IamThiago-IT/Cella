<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
		$sql      = "SELECT * FROM tb_produtos WHERE tipo=1";
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute();
		$qtde_materiais = $materiais -> rowCount();
		$fusca = NULL;
?>
<html lang="pt-br">
	<head>
		<title>Cella-Lista de Materiais</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="../Script/tooltip.js"></script>
		<style>
		.glyphicon-paperclip {color: #32CD32;font-size: 19px;}
			.glyphicon-duplicate{font-size:30px;color:#000;}
			.glyphicon-plus{
				font-size:30px;
				color:#000;
			}
			.add{
				position: absolute;
				right:20px;
			}
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
			.pdf{
				position: absolute;
				right:65px;
			}
		</style>
	</head>
	<body>
		<main class="principal">
				<div>
					<div class="tabela" id="suaDiv">
				<div class="panel panel-default">
					<div class="panel-heading" style="width: 100%;">
						<h2>Lista de Materiais</h2>
						<a href='material_pdf.php' target="_blank" id="left" data-toggle="tooltip" data-placement="bottom" title="Gerar PDF" class="pdf"><span aria-hidden="true" class="glyphicon glyphicon-duplicate"></span></a>
						<a href='Colaboradores_inserir.php' id="right" data-toggle="tooltip" data-placement="bottom" title='Adicionar mais materiais' class="add"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span></a>
					</div>
					<!-- /.panel-heading -->
					<!-- Tabela -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Nome do produto</th>
									<th>Medidas</th>
									<th>Quantidade<br>em estoque</th>
									<th>Estoque mínimo</th>
									<th>Obs</th>
									<th>Retirada</th>
								</tr>
							</thead>
							<tbody> 
										<?php
											foreach($materiais AS $estoque){
												$id_produto = $estoque['id_produto'];
												$medidas    = $estoque['medidas'];
												$nome       = $estoque['nome'];
												$qntde      = $estoque['qntde'];
												$minimo     = $estoque['estoque_min'];
												$obs        = $estoque['obs'];
												$tipo       = $estoque['tipo'];
												$saida      = "<a href='saidas.php?id=$id_produto&nome=$nome&qntde=$qntde&minimo=$minimo' 
												title='Retirar $nome?'><i class='glyphicon glyphicon-paperclip'></i></a>";
												if($qntde <= $minimo){
													echo "<tr style='border:1px solid #fe0101;background-color:#f4b8b8; color:#fff;'><td>$nome</td><td>$medidas</td><td>$qntde</td><td class='center'>$minimo</td><td>$obs</td><td>$saida</td></tr>";
												}
												else{
													echo "<tr><td>$nome</td><td>$medidas</td><td>$qntde</td><td class='center'>$minimo</td><td>$obs</td><td>$saida</td></tr>";
												}
												
											}
									?>
							</tbody>
						</table>
					</div>
					<!-- /.panel-body -->
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
		<script>
			$("a#delete-row").click(function(){
				var id = $(this).attr("data-id");
				var nome = $(this).attr("data-target");
				
				alertify.confirm('Apagar este registro: '+ nome+' ?').set('onok', function(closeEvent)
				{
					$.ajax({
					   url: 'apagar_chaves.php',
					   type: 'POST',
					   data: {id_teste: id},
					   error: function() {
						  alert('Something is wrong');
					   },
					   success: function(data) {
							$("#"+id).remove(); 
							 location.reload();
					   }
					});
				} );
			});

				$(document).ready(function() {
					$('#dataTables-example').DataTable({
						responsive: true
					});
				});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script>
		//alert
			function successClick(){
				  $.notify({
					// options
					title: '<strong>Material salvo com sucesso</strong>',
					message: "",
				  icon: 'glyphicon glyphicon-ok',
					url: 'https://github.com/mouse0270/bootstrap-notify',
					target: '_blank'
				},{
					// settings
					element: 'body',
					//position: null,
					type: "success",
					//allow_dismiss: true,
					//newest_on_top: false,
					showProgressbar: false,
					placement: {
						from: "top",
						align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 1031,
					delay: 3300,
					timer: 1000,
					url_target: '_blank',
					mouse_over: null,
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutRight'
					},
					onShow: null,
					onShown: null,
					onClose: null,
					onClosed: null,
					icon_type: 'class',
				});
			}
		</script>
		<?php
			session_start();
			if(isset($_SESSION['item_salv'])){
				echo "<script>".$_SESSION['item_salv']."</script>";
				unset($_SESSION["item_salv"]);
			}
		?>
	</body>
</html>