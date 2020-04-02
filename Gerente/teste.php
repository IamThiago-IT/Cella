<?php
	include "../conexao.php";
	$sql2 = "SELECT tb_historico_emp.*, tb_produtos.*, tb_professores.* FROM tb_historico_emp
	INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto
	INNER JOIN tb_professores ON tb_historico_emp.fk_professor = tb_professores.id_professor
	WHERE tb_historico_emp.tipo_prod = 2 ";
	$historico = $fusca->prepare($sql2);
	$historico->execute();
	$fusca = NULL;
	$html= '<table width="100%" border=1>';
	$html.= '<thead>';
	$html.= '<tr>';
	$html.= '<th>Laboratório</th>';
	$html.= '<th>Professor</th>';
	$html.= '<th>Dia e Horário do empréstimodo</th>';
	$html.= '<th>Dia e Horário Devolução</th>';
	$html.= '</tr>';
	$html.= '</thead>';
	
	foreach($historico as $hist){
		$html.= '<tbody>';
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
	$html.= '<br>';
	$html.= '<img src="' . $_POST['chart_input'] . '">';
	$html.= '<br>';
	$html.= '<img src="' . $_POST['note_input'] . '">';
	
	
	
	$filename = "newpdffile.pdf";
	require_once '../dompdf/dompdf/autoload.inc.php';
	//Criando instancia 
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	
	//$dompdf->loadHtml($html);
	$dompdf->loadHtml('<h1>Relatório de empréstimo de chaves</h1>'.$html);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4');

	// Render the HTML as PDF
	$dompdf->render();
	
	//Exibir página
	$dompdf->stream($filename,array("Attachment"=>false)); //Para realizar o dowload altomaticamente altere para true
?>
