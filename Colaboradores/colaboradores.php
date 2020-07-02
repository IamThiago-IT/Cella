<!DOCTYPE html>
<?php
	session_start();
	include "menu.php";
	include "../conexao.php";
	
	$sql      = "SELECT tb_professores.*,casa.nome_casa as nomeCasa
				FROM tb_professores
				INNER JOIN casa 
				ON tb_professores.casa = casa.id_casa WHERE tipo_usuario = 3;";
	$usuarios = $fusca-> prepare($sql);
	$usuarios -> execute();
	
	
	$sql2  = "SELECT * FROM casa ";
	$casa_sel = $fusca-> prepare($sql2);
	$casa_sel -> execute();
	$fusca = NULL;
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<title>Cella - Lista de Notebook</title>
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="cadastros.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
			.add{
				position: absolute;
				right:20px;
			}
			.glyphicon-plus{
				font-size:30px;
				color:#000;
			}
			h2{
				display:inline-block;
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
						<h2>Lista de Professores</h2>
						<a href='#' data-toggle='modal' data-target='#basicModal' id="left" data-toggle="tooltip" data-placement="bottom" title='Adicionar mais materiais' class="add"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span></a>
							<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
											<h4 class='modal-title' id='myModalLabel'>Cadastro de Professores</h4>
										</div>
										<!--<form action="conferir_professores.php" method="POST">-->
										<form action="conferir_professores.php" method="POST">
											<div class='modal-body'>
												<input type="hidden" name="id" id="id_professor">
												<div class="form-group">
													<input type="text" placeholder="Nome do professor" name="nome" id="nomeUsuario" class="form-control input-lg" data-validation="required alphanumeric" data-validation-ignore="._   /çÇéêÉáàÁÀíóôÓÍãõÃÕ()" >
												</div>
												<div class="form-group">
													<input type="number" name="numero" min='1' id="numero" placeholder="Número de matrícula" class="form-control input-lg" data-validation="number length" data-validation-length="4-5" data-validation-allowing="int">
												</div>
												<select name='casa' class='form-control input-lg' id="casa" required >
												<?php
												foreach($casa_sel as $home){
													$id_setor  = $home['id_casa'];
													$setor     = $home['nome_casa'];
													echo "<option value='$id_setor'>".$setor."</option>";
												}
												?>
												</select>
												<br>
												<input type="hidden" name="senha" id="senha">
												<input type="hidden" name="email" id="email">
											</div>
											<div class='modal-footer'>
												<input type="submit" class='btn btn-default' name="Salvar" value="Salvar" class="salvar" id="salvar">
												<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- /.panel-heading -->
						<!-- Tabela -->
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Nome do professor</th>
										<th>Número de Matrícula</th>
										<th>Casa</th>
									</tr>
								</thead>
								<tbody> 
											<?php
												foreach($usuarios AS $user){
													$id      = $user['id_professor'];
													$nome    = $user['nome_professor'];
													$numero  = $user['numero'];
													$casa    = $user['nomeCasa'];
													echo "<tr><td align=middle>$nome</td><td>$numero</td><td>$casa</td></tr>";
													
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
		
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js" ></script>
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script>
			function dangerClick(){
				$.notify({
					// options
					title: '<strong>Erro</strong>',
					message: "<br>Nome de professor ou número de matrícula já cadastrado.",
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
			function successClick(){
				  $.notify({
					// options
					title: '<strong>Professor salvo com sucesso</strong>',
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
			if(isset($_SESSION['cadas_n'])){
				echo "<script>".$_SESSION['cadas_n']."</script>";
				unset($_SESSION["cadas_n"]);
			}
		?>
		<script>
			$("a#delete-row").click(function(){
				var id = $(this).attr("data-id");
				var nome = $(this).attr("data-target");
				alertify.confirm('Apagar este registro: '+ nome+'?').set('onok', function(closeEvent){
					$.ajax({
					   url: 'apagar_usuarios.php',
					   type: 'POST',
					   data: {id_pro: id},
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
			$.validate({
				modules : 'toggleDisabled',
				lang: 'pt'
			});
		</script>
	</body>
</html>