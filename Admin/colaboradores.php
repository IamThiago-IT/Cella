<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['cadas_n'])){
		echo "<script>alert('".$_SESSION['cadas_n']."')</script>";
		unset($_SESSION['cadas_n']);
	}
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
	<title>Cella-Lista de professores</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta charset="utf-8">
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
			<div class="col-lg-12" style="margin-top: 5%;">	
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2>Lista de Professores<!-- - <font color="red">Em testes, não usar</font>--></h2>
					<a href='#' data-toggle='modal' data-target='#basicModal'><img src="imagens/plus.png" title='Adicionar professor' style="width: 25px; height: 25px; position: relative; left:95%; top: -30px" /></a>
						<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'>Cadastro de Professores</h4>
									</div>
									<form action="conferir_professores.php" method="POST">
										<div class='modal-body'>
											<input type="hidden" name="id_professor">
											<input type="text" placeholder="Nome do professor" name="nome" class="form-control input-lg" required >
											<br>
											<input type="number" name="num_matri" min='1' placeholder="Número de matrícula" class="form-control input-lg" required >
											<br>
											<select name='casa' class='form-control input-lg' required >
											<?php
											foreach($casa_sel as $home){
												$id_setor  = $home['id_casa'];
												$setor     = $home['nome_casa'];
												echo "<option value='$id_setor'>".$setor."</option>";
											}
											?>
											</select>
											<br>
											<input type="hidden" name="senha">
											<input type="hidden" name="email">
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
											<input type="submit" class='btn btn-default' name="Salvar" value="Salvar">
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
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody> 
										<?php
											foreach($usuarios AS $user){
												$id      = $user['id_professor'];
												$nome    = $user['nome_professor'];
												$numero  = $user['numero'];
												$casa    = $user['nomeCasa'];
												$editar     = "<a href='editar_prof.php?id=$id' 
												title='Editar $nome?'>
													<img src='imagens/editar.png' width='25px'>
												</a>";
												$excluir = "<a id='delete-row' href='#' data-id='$id' data-target='$nome' title='Excluir $nome ?'><img src='imagens/trash.png' width='25px'></a>";
												echo "<tr><td align=middle>$nome</td><td>$numero</td><td>$casa</td><td align=middle>$editar</td><td align=middle>$excluir</td></tr>";
												
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
		var nome = $(this).attr("data-target");

        if(confirm('Apagar este registro ?'+ nome))
        {
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
        }
    });
	
	
	
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		</script>
</html>