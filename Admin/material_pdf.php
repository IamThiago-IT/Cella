<?php
	include "../conexao.php";
	$sql      = "SELECT * FROM tb_produtos WHERE tipo=1";
		$materiais = $fusca -> prepare($sql);
		$materiais -> execute();
		$qtde_materiais = $materiais -> rowCount();
		$fusca = NULL;
	$html = '<html lang="pt-br">
	<head>
		<title>Relatório de Empréstimos</title>
		<meta charset="UTF-8"/>
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
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
		<link href="../bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		   @page {
				margin: 100px 0px 70px 0px;
			}
			#head{
				background-color: #035e7f;
				font-size: 25px;
				text-align: center;
				height: 100px;
				width: 100%;
				position: fixed;
				top: -100px;
				left: 0;
				right: 0;
				margin: auto;
				margin-bottom:100px;
			}
			 #corpo{
				width: 600px;
				position: relative;
				top:20px;
				margin: auto;
				height:200px;
			}
			#footer {
				position: fixed;
				background-color:#035e7f;
				color:white;
				bottom: 0;
				width: 100%;
				text-align: right;
				border-top: 1px solid gray;
			}
			#footer .page:after{ 
				content: counter(page); 
			}
			.logo{padding-top:10px ;width: 150px; height: 85px;}
		</style></head>';
	$html.= '<body>
	<div id="head">
		<img src="../img/logoBandeira.png" class="logo" alt="Logo" title="logo"> 
	</div>';
	$html.= '<main id="corpo">';
	$html.= '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">';
	$html.= '<thead>';
	$html.= '<tr>';
	$html.= '<th>Nome do produto</th>';
	$html.= '<th>Medidas</th>';
	$html.= '<th>Quantidade em estoque</th>';
	$html.= '<th>Obs</th>';
	$html.= '</tr>';
	$html.= '</thead>';
	
	foreach($materiais as $estoque){
		$html.= '<tbody class="tabela">';
				$id_produto = $estoque['id_produto'];
				$medidas    = $estoque['medidas'];
				$nome       = $estoque['nome'];
				$qntde      = $estoque['qntde'];
				$minimo     = $estoque['estoque_min'];
				$obs        = $estoque['obs'];
				$tipo        = $estoque['tipo'];
				$html.= '<tr><td>'.$nome.'</td><td>'.$medidas.'</td><td>'.$qntde.'</td><td>'.$obs.'</td></tr>.';
		$html.= '</tbody>';
	}
	$html.= '</table>';
	$html.= '</main><br>';
	$footer='<div id="footer">
            <p class="page">Página </p>
        </div>';
	
	
	$filename = "newpdffile.pdf";
	require_once '../dompdf/dompdf/autoload.inc.php';
	//Criando instancia 
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	
	//$dompdf->loadHtml($html);
	$dompdf->loadHtml('<h1 style=" text-align: center;">Relatório de Materiais</h1>'.$html.$footer);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4');

	// Render the HTML as PDF
	$dompdf->render();
	
	//Exibir página
	$dompdf->stream($filename,array("Attachment"=>false)); //Para realizar o dowload altomaticamente altere para true
?>
