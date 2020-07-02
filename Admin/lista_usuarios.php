<!DOCTYPE html>
<?php
	session_start();	
	include "menu.php";
	include "../conexao.php";
	$sql    = "SELECT tb_professores.*, tipo_user.nome_usuario
    FROM tb_professores
    INNER JOIN tipo_user
    ON tb_professores.tipo_usuario = tipo_user.tipo_usuario WHERE tb_professores.tipo_usuario = 1 OR tb_professores.tipo_usuario = 2";
	$users = $fusca -> prepare($sql);
	$users  -> execute();
	
	$fusca = NULL;
?>
<html lang="pt-br">
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
			.glyphicon-duplicate{font-size:30px;color:#000;}
			.glyphicon-plus{
				font-size:30px;
				color:#000;
			}
			.add{
				position: absolute;
				right:20px;
			}
			.btn-icon {color: Red;font-size: 20px;}
			.btn-iconi {color: blue;font-size: 20px;}
			.glyphicon-paperclip {color: #32CD32;font-size: 19px;}
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
						<h2>Lista de Usuários</h2>
						<a href='admin_cadastro.php' id="left" data-toggle="tooltip" data-placement="bottom" title='Adicionar mais usuários' class="add"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span></a>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Usuário</th>
									<th>Número de Matrícula</th>
									<th>E-mail</th>
									<th>Cargo</th>
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($users as $user){
									$id_user = $user['id_professor'];
									$nome    = $user['nome_professor'];
									$numero  = $user['numero'];
									$email   = $user['email'];
									$tipo    = $user['nome_usuario'];
									$editar  = "<a href='editar_users.php?id=$id_user' 
												title='Editar $nome ?'>
												<i class='fas fa-edit btn-iconi'></i>
												</a>";
									$excluir = "<a id='delete-row' href='#' aria-hidden='true' data-id='$id_user' data-target='$nome' title='Excluir $nome ?'><i class='fas fa-trash-alt btn-icon'></i></a>";
									echo "<tr><td>$nome</td><td>$numero</td><td>$email</td><td>$tipo</td><td align=middle>$editar</td><td align=middle>$excluir</td></tr>";
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
		<main class="rodape">
			© Copyright 2019-2020
		</main>
		<?php
			session_start();
			if(isset($_SESSION['cadas_n'])){
				echo "<script>".$_SESSION['cadas_n']."</script>";
				unset($_SESSION["cadas_n"]);
			}
		?>
		<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		</script>
		<script>
			$("a#delete-row").click(function(){
				var id = $(this).attr("data-id");
				var nome = $(this).attr("data-target");

				alertify.confirm('Apagar o usuário: '+ nome+' ?').set('onok', function(closeEvent){
					$.ajax({
					   url: 'apagar_usuarios.php',
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