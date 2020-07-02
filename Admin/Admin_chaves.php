<!DOCTYPE html>
<?php
	include "../conexao.php";
	session_start();
	$chama_chaves    = "SELECT tb_produtos.*,tb_emprestimos.* FROM tb_produtos
	LEFT JOIN tb_emprestimos ON tb_produtos.id_produto = tb_emprestimos.fk_produto
	WHERE tb_produtos.tipo = 2 ";
	$itens = $fusca -> prepare($chama_chaves);
	$itens -> execute();
	include "menu.php";
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Lista de Chaves</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="sortcut icon" href="../img/shortcut_cella.png" type="image/png" />
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="../Script/tooltip.js"></script>
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
			.add{
				position: absolute;
				right:20px;
			}
			.glyphicon-plus{
				font-size:30px;
				color:#000;
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
						<h2>Chaves</h2>
						<a href='#' data-toggle='modal' data-target='#basicModal' id="left" data-toggle="tooltip" data-placement="bottom" title='Cadastrar mais chaves' class="add"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span></a>
						<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'>Cadastro de chave</h4>
									</div>
									<form action="conferir_chaves.php" method="POST">
										<div class='modal-body'>
											<input type="text" name="nome_sala" placeholder="Nome da sala" class="form-control input-lg" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéÉáàÁÀíóôÓÍ()" autofocus >
											<input type="hidden" name="id">
											<input type="hidden" name="medidas">
											<input type="hidden" name="quantidade">
											<input type="hidden" name="minimo">
											<input type="hidden" name="obs">
										</div>
										<div class='modal-footer'>
											<input type="submit" class='btn btn-default' name="Salvar" value="Salvar">
											<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Nome da sala</th>
									<th>Editar </th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
				
							
								<?php
										foreach($itens as $lista){
											$id_produto =  $lista['id_produto'];
											$nome_sala  =  $lista['nome'];
											$tipo       =  $lista['tipo'];
											$id_chave   =  $lista['fk_produto'];
											$devolucao  =  $lista['data_hora_devolucao'];
											if($id_produto == $id_chave){
												$editar = "<a href='#' 
												title='Editar chave de $nome_sala inativado.'>
													<i style='color:#CCC;' class='fas fa-edit btn-iconi'></i>
												</a>";
												$excluir = "<a href='#' title='Excluir $nome_sala inativado.'><i style='color:#CCC;' class='fas fa-trash-alt btn-icon'></a>";
											}
											else{
												$editar     = "<a href='chaves_editar.php?id=$id_produto' 
												title='Editar chave de $nome_sala ?'>
													<i class='fas fa-edit btn-iconi'></i>
												</a>";
												$excluir = "<a id='delete-row' href='#' aria-hidden='true' data-id='$id_produto' data-target='$nome_sala' title='Excluir chave da sala $nome_sala ?'><i class='fas fa-trash-alt btn-icon'></a>";
											}
											echo "<tr><td>$nome_sala</td><td align=middle>$editar</td><td align=middle>$excluir</td></tr>";
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
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script>
		function successClick(){
			  $.notify({
				// options
				title: '<strong>Chave de sala salva com sucesso</strong>',
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
		function dangerClick(){
			  $.notify({
				// options
				title: '<strong>Erro</strong>',
				message: "<br>Chave de sala já cadastrada.",
			  icon: 'glyphicon glyphicon-remove-sign',
			},{
				// settings
				element: 'body',
				position: null,
				type: "danger",
				allow_dismiss: true,
				newest_on_top: false,
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
					enter: 'animated flipInY',
					exit: 'animated flipOutX'
				},
				onShow: null,
				onShown: null,
				onClose: null,
				onClosed: null,
				icon_type: 'class',
			});
		}
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
		<?php
		session_start();
			if(isset($_SESSION['msgMarca'])){
				echo "<script>".$_SESSION['msgMarca']."</script>";
				unset($_SESSION["msgMarca"]);
			}
			?>
		<script>
			$("a#delete-row").click(function(){
				var id = $(this).attr("data-id");
				var nome = $(this).attr("data-target");

				alertify.confirm('Apagar este registro: '+ nome+' ?').set('onok', function(closeEvent){
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
		</script>
	</body>
</html>
