<?php
try{ //tente
		$fusca = new PDO("mysql:host=localhost;dbname=u513475005_cella","u513475005_cella123","maria34");
		//echo "Conexão efetuada com sucesso";
	} 
	catch(PDOException $e){ //Bloco correspondente ao try	
		// verificar var_dump($e);
		// verificar método echo $e->getCode(); 
		echo $e->getMessage(); //método amplamente utilizado		
	}
	$hoje = date('Y/m/d');
	$date=date_create($hoje);
	date_sub($date,date_interval_create_from_date_string("30 days"));
	$Ddiferenca = date_format($date,"Y/m/d");
	$sql = "SELECT casa.nome_casa, COUNT(tb_historico_emp.id_emprestimo) as quantidade, tb_historico_emp.casa FROM tb_historico_emp INNER JOIN casa ON casa.id_casa = tb_historico_emp.casa WHERE tb_historico_emp.tipo_prod = 3 AND (data_hora_emprestimo >= '$Ddiferenca') GROUP BY casa";
	$itens = $fusca -> prepare($sql);
	$itens -> execute();
// Estrutura basica do grafico
$grafico = array(
    'dados' => array(
        'cols' => array(
            array('type' => 'string', 'label' => 'Descrição'),
            array('type' => 'number', 'label' => 'Quantidade')
        ),  
        'rows' => array()
    ),
    'config' => array(
        'title' => 'Gráfico da quantidade que cada casa emprestou notebooks no último mês.',
        'width' => 500,
        'height' => 400
    )
);
$j = 0;

while ($obj = $itens->fetchObject()) {
    $grafico['dados']['rows'][] = array('c' => array(
		array('v' => $obj->nome_casa),
        array('v' => (int)$obj->quantidade)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);
?>
