<?php

try{ //tente
		$fusca = new PDO("mysql:host=localhost;dbname=u277754222_cella","u277754222_cella123","cella123");
		//echo "Conexão efetuada com sucesso";
	} 
	catch(PDOException $e){ //Bloco correspondente ao try	
		// verificar var_dump($e);
		// verificar método echo $e->getCode(); 
		echo $e->getMessage(); //método amplamente utilizado		
	}
	/*$sql = "SELECT tb_historico_emp.count(*), casa.* FROM tb_historico_emp
	INNER JOIN casa ON tb_historico_emp.casa = casa.id_casa
	WHERE tb_historico_emp.tipo_prod = 2";*/
	$sql = "SELECT tb_produtos.nome, COUNT(tb_historico_emp.id_emprestimo) as quantidade, tb_historico_emp.fk_produto FROM tb_historico_emp INNER JOIN tb_produtos ON tb_produtos.id_produto = tb_historico_emp.fk_produto WHERE tb_historico_emp.tipo_prod = 3 GROUP BY fk_produto";
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
        'title' => 'Gráfico das chaves mais pegas em um mês',
        'width' => 700,
        'height' => 600
    )
);
$j = 0;

while ($obj = $itens->fetchObject()) {	
    $grafico['dados']['rows'][] = array('c' => array(
        array('v' => $obj->nome),
        array('v' => (int)$obj->quantidade)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);
?>
