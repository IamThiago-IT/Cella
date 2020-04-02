<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['item_salv'])){
		echo "<script>alert('".$_SESSION['item_salv']."')</script>";
		unset($_SESSION["item_salv"]);
	}	
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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>	
		<script>
		</script>
		
	</head>
	<body>
		<div class="row" style="position:relative; margin-top: 2%; margin-left: 3%; margin-right: 5%;">
			<div class="col-lg-12" style="margin-top: 5%;">	<!--a href="../Documentacao_BD">Download - Documentação e BD</a-->
				<div class="panel panel-default">
					<div class="panel-heading" style="width: 100%;">
					<h2>Lista de Materiais</h2>		<!--............Íncone não aumenta de tamanho...............-->
					<a href='gerente_inserir.php'><img src="imagens/plus.png" title='Adicionar mais materiais' style="width: 25px; height: 25px; position: relative; left:95%; top: -30px" /></a>
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
									<th>Editar</th>
									<th>Excluir</th>
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
												$tipo        = $estoque['tipo'];
												$editar     = "<a href='produtos_editar.php?id=$id_produto' 
												title='Editar $nome $id_produto?'>
													<img src='imagens/editar.png' width='25px'>
												</a>";
												$excluir = "<a id='delete-row' href='#' aria-hidden='true' data-id='$id_produto' data-target='$nome' title='Excluir $nome ?'><img src='imagens/trash.png' width='25px'></a>";
												echo "<tr><td>$nome</td><td>$medidas</td><td>$qntde</td><td class='center'>$minimo</td><td>$obs</td><td align=middle>$editar</td><td align=middle>$excluir</td></tr>";
												
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

		<!-- Custom Theme JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		
		
	</body>
	<script>
    $("a#delete-row").click(function(){
        var id = $(this).attr("data-id");
		var nome = $(this).attr("data-target");


        if(confirm('Apagar este registro ?'+ nome))
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
        }
    });

		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		</script>
	
	
</html>