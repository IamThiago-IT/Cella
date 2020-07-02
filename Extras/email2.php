<?php

$de   = "webmaster@umsite.com.br";
$para = "algum@dominio.br";
$mensagem .="Isto é um teste";
mail($para, "teste",$mensagem. "From: $de" );

?>