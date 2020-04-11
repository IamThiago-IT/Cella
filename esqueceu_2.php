<?php

	$email = $_POST['datas'];
	mail($email,"Segue e-mail","Oi, tudo bem?\n teste teste teste");
	header('location:esqueceu.php');

?>