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
	$sql = "SELECT tb_historico_emp.id_emprestimo, tb_historico_emp.fk_produto, SUM(tb_historico_emp.qntde_emp) as soma, tb_produtos.nome FROM tb_historico_emp INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto
	WHERE tipo_prod = 1 AND (data_hora_devolucao >= '$Ddiferenca') GROUP BY fk_produto order by soma desc limit 5";
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
        'title' => '5 materiais mais emprestados do almoxarifado no último mês',
        'width' => 500,
        'height' => 400
    )
);
$j = 0;

while ($obj = $itens->fetchObject()) {
    $grafico['dados']['rows'][] = array('c' => array(
		array('v' => $obj->nome),
        array('v' => (int)$obj->soma)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);
?>
