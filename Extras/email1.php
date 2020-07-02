<?PHP
$nome     =  $_POST["nome"];
$email    =  $_POST["email"];
$sugestao =  $_POST["sugestao"];
$mensagem =	 "Sugestão enviada por um visitante:\n\n";
$mensagem .= "Nome: $nome\n";
$mensagem .= "E-mail: $email\n";
$mensagem .= "Sugestão: $sugestao";
mail("webmaster@umsite.com.br" "Sugestao""$mensagem");
echo "Obrigado";
?>