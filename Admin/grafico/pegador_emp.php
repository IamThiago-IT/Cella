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
	$sql = "SELECT COUNT(tb_produtos.id_produto) as quantidade, tb_tipos.descricao as nome_casa from tb_produtos
	LEFT JOIN tb_emprestimos ON tb_produtos.id_produto = tb_emprestimos.fk_produto,
	INNER JOIN tb_produtos.tipo = tb_tipo.id_tipo
	WHERE tb_produtos.tipo = 2 AND tb_emprestimos.fk_produto is NULL UNION 
	SELECT COUNT(tb_emprestimos.id_emprestimo) as quantidade, casa.nome_casa FROM tb_emprestimos
	INNER JOIN casa ON casa.id_casa = tb_emprestimos.casa WHERE tb_emprestimos.tipo_prod = 2 GROUP BY casa";
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
        'title' => 'Gráfico da quantidade de chaves que estão emprestadas e que estão no almoxarifado',
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
