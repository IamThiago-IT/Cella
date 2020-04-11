<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['item_salv'])){
		echo "<script>alert('".$_SESSION['item_salv']."')</script>";
		unset($_SESSION["item_salv"]);
	}	
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
	<head>
	<title>Cella-Usuários</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<div class="row" style="position:relative; margin-top: 2%; margin-left: 3%; margin-right: 5%;">
			<div class="col-lg-12" style="margin-top: 5%;">	
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Lista de Usuários</h2>
						<a href='gerente_cadastro.php'><img src="imagens/plus.png" title='Cadastrar novo colaborador' style="width: 25px; height: 25px; position: relative; left:95%; top: -30px" /></a>
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
												<img src='imagens/editar.png' width='25px'>
												</a>";
									$excluir = "<a id='delete-row' href='#' aria-hidden='true' data-id='$id_user' data-target='$nome' title='Excluir $nome ?'><img src='imagens/trash.png' width='25px'></a>";
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
		
		<footer class="sticky-footer bg-white"> 
			<div class="container my-auto"> 
				<div class="copyright text-center my-auto">
					<span>Copyright © Your Website 2019</span>
				</div>
			</div>
		</footer>
	
	</body>
	<script>
    $("a#delete-row").click(function(){
        var id = $(this).attr("data-id");


        if(confirm('Apagar este registro ?'+ id))
        {
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
        }
    });
	</script>
</html>