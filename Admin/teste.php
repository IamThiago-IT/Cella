<?php
	include "../conexao.php";
	$sql2 = "SELECT tb_historico_emp.*, tb_produtos.*, tb_professores.* FROM tb_historico_emp
	INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto
	INNER JOIN tb_professores ON tb_historico_emp.fk_professor = tb_professores.id_professor
	WHERE tb_historico_emp.tipo_prod = 2 ";
	$historico = $fusca->prepare($sql2);
	$historico->execute();
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
				width: 750px;
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
	$html.= '<th>Laboratório</th>';
	$html.= '<th>Professor</th>';
	$html.= '<th>Dia e Horário do empréstimodo</th>';
	$html.= '<th>Dia e Horário Devolução</th>';
	$html.= '</tr>';
	$html.= '</thead>';
	
	foreach($historico as $hist){
		$html.= '<tbody class="tabela">';
				$id_hist = $hist['id_emprestimo'];
				$produto_hist = $hist['nome'];
				$professor_hist = $hist['nome_professor'];
				$hora_emp_hist  = $hist['data_hora_emprestimo'];
				$hora_hist_emp      = explode(" ",$hora_emp_hist);
				$data_hist_emp =	explode("-",$hora_hist_emp[0]);
				$hora_dev_hist  = $hist['data_hora_devolucao'];
				$hora_hist_dev      = explode(" ",$hora_dev_hist);
				$data_dev_hist =	explode("-",$hora_hist_dev[0]);
				$html.= '<tr><td>'.$produto_hist.'</td><td>'.$professor_hist.'</td><td>'.$data_hist_emp[2].'-'.$data_hist_emp[1].'-'.$data_hist_emp[0].'/'. $hora_hist_emp[1] .'</td><td>'.$data_dev_hist[2].'-'.$data_dev_hist[1].'-'.$data_dev_hist[0].'/'. $hora_hist_dev[1] .'</td></tr>.';
		$html.= '</tbody>';
	}
	$html.= '</table>';
	$html.= '</main>';
	$html.= '<br>';
	$html.= '<br>';
	$hoje = date('d/m/Y');
	$footer='<div id="footer">
            <p class="page">'.$hoje.'  Página </p>
        </div>';
	
	
	$filename = "newpdffile.pdf";
	require_once '../dompdf/dompdf/autoload.inc.php';
	//Criando instancia 
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	
	//$dompdf->loadHtml($html);
	$dompdf->loadHtml('<h1 style=" text-align: center;">Relatório de empréstimo de chaves</h1>'.$html.$footer);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4');

	// Render the HTML as PDF
	$dompdf->render();
	
	//Exibir página
	$dompdf->stream($filename,array("Attachment"=>false)); //Para realizar o dowload altomaticamente altere para true
?>
