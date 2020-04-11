<!DOCTYPE html>
<?php
	include "../conexao.php";
	session_start();
	if(isset($_SESSION['item_salv'])){
		echo "<script>alert('".$_SESSION['item_salv']."')</script>";
		unset($_SESSION["item_salv"]);
	}	
	$chama_chaves    = "SELECT tb_produtos.*,tb_emprestimos.* FROM tb_produtos
	LEFT JOIN tb_emprestimos ON tb_produtos.id_produto = tb_emprestimos.fk_produto
	WHERE tb_produtos.tipo = 2 ";
	$itens = $fusca -> prepare($chama_chaves);
	$itens -> execute();
	include "menu.php";
	if(isset($_POST['Salvar'])){
		session_start();
		$id                  = $_POST['id'];
		$n_sala              = $_POST['nome_sala'];
		$medidas             = $_POST['medidas'];
		$qntde               = $_POST['quantidade'];
		$minimo              = $_POST['minimo'];
		$rtvl                = 1;
		$obs                 = $_POST['obs'];
		$tipo                = 2;
		$_SESSION['id']         = $id;
		$_SESSION['nome']       = $n_sala;
		$_SESSION['medidas']    = $medidas;
		$_SESSION['quantidade'] = $qntde;
		$_SESSION['minimo']     = $minimo;
		$_SESSION['rtvl']       = $rtvl;
		$_SESSION['obs']        = $obs;
		$_SESSION['tipo']       = $tipo;
		echo "<script>window.location.href = 'conferir_chaves.php'</script>";
	}
?>
<html lang="pt-br">
	<head>
	<title>Cella-Lista de Chaves</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<meta charset="utf-8">
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
			<div class="col-lg-12" style=" margin-top: 5%;">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Chaves</h2>
						<a href='#' data-toggle='modal' data-target='#basicModal'><img src="imagens/plus.png" title='Adicionar mais materiais' style="width: 25px; height: 25px; position: relative; left:95%; top: -30px" /></a>
						<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'>Cadastro de chave</h4>
									</div>
									<form action="#" method="POST">
										<div class='modal-body'>
											<input type="text" name="nome_sala" placeholder="Nome da sala" class="form-control input-lg" required autofocus >
											<input type="hidden" name="id">
											<input type="hidden" name="medidas">
											<input type="hidden" name="quantidade">
											<input type="hidden" name="minimo">
											<input type="hidden" name="obs">
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
												$editar = "#";
												$excluir = "#";
												//$emp = "#";
											}
											else{
												$editar     = "<a href='chaves_editar.php?id=$id_produto' 
												title='Editar chave de $nome_sala ?'>
													<img src='imagens/editar.png' width='25px'>
												</a>";
												$excluir = "<a id='delete-row' href='#' aria-hidden='true' data-id='$id_produto' data-target='$nome_sala' title='Excluir chave da sala $nome_sala ?'><img src='imagens/trash.png' width='25px'></a>";
												//$emp = "<a href='emp_chaves.php?id=$id_produto&tipo=$tipo&nome=$nome_sala&pagina=gerente_chaves'><span class='glyphicon glyphicon-plus'></span></a>";
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

		<!-- Custom Th e JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
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
	</script>
</html>
