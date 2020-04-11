<?php

	/*
	Professor Cezar Jenzura
	conexao.php
	Arquivo para conexão com o banco de dados
	*/
	try{ //tente
		$fusca = new PDO("mysql:host=localhost;dbname=modain69_cella","modain69_cella","cella123");
		//echo "Conexão efetuada com sucesso";
	} 
	catch(PDOException $e){ //Bloco correspondente ao try	
		// verificar var_dump($e);
		// verificar método echo $e->getCode(); 
		echo $e->getMessage(); //método amplamente utilizado		
	}

?>	