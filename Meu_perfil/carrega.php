<?php
	$id          = $_POST['id'];
	$morango     = $_FILES['tucano'];
	$titulo_img  = $morango['name'];
	$tamanho     = $morango['size'];
	$tmp         = $morango['tmp_name'];
	$formato     = pathinfo($titulo_img, PATHINFO_EXTENSION);
	$img_nome_novo = uniqid().".".$formato;
	echo "Nome-arquivo: ".$titulo_img."<br>";
	echo "Tamanho:".$tamanho."<br>";
	echo "Extensão:".$formato."<br>";
	echo "Arquivo Temporário:".$tmp."<br>";
	echo "Novo nome:".$img_nome_novo;
	if($formato == 'png' || $formato == 'jpeg' || $formato == 'jpg'){
		$upload = move_uploaded_file($tmp, 'imagens'.'/'.$img_nome_novo);
		if(isset($upload)){
			session_start();
			include "../conexao.php";
			$sql  =  "UPDATE tb_professores SET
						img = ?
						WHERE id_professor = ?";
			$contatos = $fusca -> prepare($sql);
			$contatos -> execute(array($img_nome_novo,$id));
			$fusca = null;
			$_SESSION['img'] = $img_nome_novo;
			Header('location:perfil.php');
		}
		else{
			echo "<script>alert('Formato Errado');</script>";
		}
	}
?>