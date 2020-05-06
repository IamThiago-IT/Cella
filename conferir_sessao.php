<?php
	$usuario_digitado = $_POST['numero'];
	$senha_digitada   = md5($_POST['senha']);
	$sql      = "SELECT * FROM tb_professores WHERE numero='$usuario_digitado'
	AND 
	senha_professor = '$senha_digitada'";
	include 'conexao.php';
	$usuario  = $fusca -> prepare($sql);
	$usuario -> execute();
	$existe = $usuario -> rowCount();
	
	foreach($usuario AS $comp){
		$id_professor = $comp['id_professor'];
		$nome = $comp['nome_professor'];
		$numero = $comp['numero'];
		$tipo = $comp['tipo_usuario'];
		$senha = $comp['senha_professor'];
		$email = $comp['email'];
		$img = $comp['img'];
	}
	$fusca = NULL;
	if($existe==1){
		if($tipo == 1){
			session_start();
			$_SESSION['id_professor'] = $id_professor;
			$_SESSION['nome_professor'] = $nome;
			$_SESSION['tipo_usuario'] = $tipo;
			$_SESSION['numero'] = $numero;
			$_SESSION['senha_professor'] = $senha;
			$_SESSION['email'] = $email;
			$_SESSION['img'] = $img;
			$_SESSION["entrar"] = "OK";
			setcookie("CookieAlmoxProfessor","Teste de Cookie professor", time()+2040);

			header("Location:Colaboradores/home.php");
			
			
			
		}
		else{
			session_start();
			$_SESSION['id_professor'] = $id_professor;
			$_SESSION['nome_professor'] = $nome;
			$_SESSION['tipo_usuario'] = $tipo;
			$_SESSION['numero'] = $numero;
			$_SESSION['senha_professor'] = $senha;
			$_SESSION['email'] = $email;
			$_SESSION['img'] = $img;
			$_SESSION["abrir"] = "YES";
			setcookie("CookieAlmox","Teste de Cookie", time()+2040);

			header("Location:Admin/home.php");
			
		}
	}
	else{
		session_start();
		$_SESSION["caderno"] = "NO";
		$_SESSION['msg'] = "Login e/ou senha incorreta";
        echo "<script>window.location.href = 'index.php';</script>";
	}
?>

