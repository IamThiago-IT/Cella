<!DOCTYPE html>
<?php	
	include "../conexao.php";
	include "home_menu.php";
	session_start();
	$id_professor = $_SESSION['id_professor'];
	$professor = $_SESSION['nome_professor'];
	$numero = $_SESSION['numero'];
	$senha = $_SESSION['senha_professor'];
	$tipo = $_SESSION['tipo_usuario'];
	$sql = "SELECT * FROM tipo_user WHERE tipo_usuario = $tipo "; 
	$materiais = $fusca -> prepare($sql);
	$materiais -> execute();
	foreach($materiais as $material){
		$user = $material['nome_usuario'];
	}
?>
<html>
<head>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="sortcut icon" href="../img/shortcut_cella.png" type="image/png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="../Colaboradores/style.css" />
		<link rel="stylesheet" href="../style.css" />
		<meta name="description" content="">
		<meta name="author" content="">
	<title>Cella-Home</title>
</head>
<body>
	<div id="google_translate_element" class="boxTradutor"></div>
  <div class="pt-table desktop-768">
    <div class="pt-tablecell page-home relative">
                    <div class="container">
                        <div class="row"><br><br>
					<h3 align="center">Seja bem-vindo,  <?php
						echo $professor;
					?></h3><br>
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">

                                <div class="hexagon-menu clear">
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="Colaboradores_materiais.php" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-list"></i>
                                                </span>
                                                <span class="title">Lista de Materiais</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="Colaboradores_chaves.php" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-key"></i>
                                                </span>
                                                <span class="title">Chaves</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="colaboradores_notebooks.php" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-laptop"></i>
                                                </span>
                                                <span class="title">Lista de Notebooks</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>    
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="../Meu_perfil/perfil.php" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <span class="title">Perfil</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="emprestimos.php" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-life-ring"></i>
                                                </span>
                                                <span class="title">Emprestimos</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="../Documentacao_BD/MANUAL_DO_COLABORADOR.pdf" target="_blank" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-clipboard"></i>	
                                                </span>
                                                <span class="title">MANUAL</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a data-toggle="modal" data-target="#exampleModalsm" href="#" href="#" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                     <i class="fa fa-map-signs"></i>
                                                </span>
                                                <span class="title">Sair</span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
					<!--Rodapé-->
							<footer class="footerone"> 
										<span>&copy; Copyright 2019 - 2020</span>
							</footer>
					<!--Rodapé-->
					<!-- Modal -->
<div class="modal fade" id="exampleModalsm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		<h3 class="modal-title" id="exampleModalLabel">Sair?</h3>
      </div>
      <div class="modal-body">
        Tem certeza que deseja sair?
      </div> 
      <div class="modal-footer">
	  <div class="col-xs-12 col-sm-6">
		<a href="../logout.php" type="button"  class="btn btn-default">Sim</a>
	  </div>
	  <div class="col-xs-12 col-sm-6">
        <a type="button" class="btn btn-default" data-dismiss="modal">Não</a>
      </div>
	  </div>
    </div>
  </div>
</div>
			 </div>
			</div>		
	</body>
</html>