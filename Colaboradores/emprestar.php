<?php
include "../conexao.php";
	$sql      = "SELECT tb_produtos.*,tb_emprestimos.* FROM tb_produtos
	LEFT JOIN tb_emprestimos ON tb_produtos.id_produto = tb_emprestimos.fk_produto
	WHERE tb_produtos.tipo = 3 ";		//AND tipo= 1
	$materiais = $fusca -> prepare($sql);
	$materiais -> execute();
	$chama_chaves    = "SELECT tb_produtos.*,tb_emprestimos.* FROM tb_produtos
	LEFT JOIN tb_emprestimos ON tb_produtos.id_produto = tb_emprestimos.fk_produto
	WHERE tb_produtos.tipo = 2 ";
	$itens = $fusca -> prepare($chama_chaves);
	$itens -> execute();
?>
<style>
			h2{
				font-size: 3.7vh;
			}
			thead{
				font-size: 2.5vh;
			}
			tbody{
				font-size: 2.5vh;
			}
</style>
<main class="resultado">
						<div class="direita">
							<div class="row" style="margin-top: 2%; margin-left: 3%; margin-right: 3%;">
								<div class="col-lg-12">	
									<div class="panel panel-default">
										<div class="panel-heading">
											<h2>Notebooks</h2>
										</div>
										<div class="panel-body">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>Número de Série</th>
														<th>Emp.</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($materiais as $n_lista){
															$id_produto    =  $n_lista['id_produto'];
															$nome_note     =  $n_lista['nome'];
															$id_chave   =  $n_lista['fk_produto'];
															$tipo          =  $n_lista['tipo'];
															if($id_produto == $id_chave){
																$emp = "#";
															}
															else{
																$emp = "<a href='emp_chaves.php?id=$id_produto&tipo=$tipo&nome=$nome_note&pagina=emprestimos'><span class='glyphicon glyphicon-plus'></span></a>";
																echo "<tr><td>$nome_note</td><td align=middle>$emp</td></tr>";
															}
														}
													?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="esquerda">
							<div class="row" style="margin-top: 2%; margin-left: 3%; margin-right: 3%;">
								<div class="col-lg-12">	
									<div class="panel panel-default">
										<div class="panel-heading">
											<h2>Chaves</h2>
										</div>
										<div class="panel-body">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>Sala</th>
														<th>Emp.</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach($itens as $lista){
														$id_sala =  $lista['id_produto'];
														$nome_sala  =  $lista['nome'];
														$tipo       =  $lista['tipo'];
														$id_mesma   =  $lista['fk_produto'];
														if($id_sala == $id_mesma){
															$emp = "#";
														}
														else{
															$emp = "<a href='emp_chaves.php?id=$id_sala&tipo=$tipo&nome=$nome_sala&pagina=emprestimos'><span class='glyphicon glyphicon-plus'></span></a>";
															echo "<tr><td>$nome_sala</td><td align=middle>$emp</td></tr>";
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</main>
					<script src="../bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="../bootstrap/vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>

		<!-- Custom Th e JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>
					