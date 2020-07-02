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
	$sql = "SELECT nome, qntde FROM tb_produtos WHERE tipo = 1  order by qntde desc limit 5";
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
        'title' => '5 materiais em maior quantidade',
        'width' => 500,
        'height' => 400
    )
);
$j = 0;

while ($obj = $itens->fetchObject()) {
    $grafico['dados']['rows'][] = array('c' => array(
		array('v' => $obj->nome),
        array('v' => (int)$obj->qntde)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);
?>
