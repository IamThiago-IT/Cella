<!DOCTYPE html>
<?php
	include "menu.php";
	include "../conexao.php";
	$id     =  $_GET['id'];
	$sql = "SELECT tb_professores.*, tipo_user.* FROM tb_professores INNER JOIN tipo_user ON tb_professores.tipo_usuario = tipo_user.tipo_usuario WHERE id_professor = '$id'";
	$professores = $fusca->prepare($sql);
	$professores -> execute();
	
	$sql3 = "SELECT * FROM tipo_user WHERE tipo_usuario <> 3";
	$user = $fusca->prepare($sql3);
	$user -> execute();
	
	foreach($professores as $prof ){
		$nome    = $prof['nome_professor'];
		$numero  = $prof['numero'];
		$email   = $prof['email'];
		$tipo    = $prof['tipo_usuario'];
		$nome_tipo = $prof['nome_usuario'];
	}
	if(isset($_POST['editar'])){
		$id_edit      = $_POST['id_prf'];
		$nome_edit    = $_POST['nome'];
		$numero_edit  = $_POST['numero'];
		$email_edit   = $_POST['email'];
		$tipo_edit    = $_POST['tipo_user'];
		$sql2  = "UPDATE tb_professores SET
			nome_professor = ?,
			numero         = ?,
			email          = ?,
			tipo_usuario   = ?
		WHERE id_professor = ?";
		$editar  = $fusca -> prepare($sql2);
		$editar -> execute(array($nome_edit,$numero_edit,$email_edit,$tipo_edit,$id_edit));
		echo "<script>window.location.href = 'lista_usuarios.php' </script>";
	}
	
	$fusca =NULL;
	?>
<html lang="pt-br">
	<head>
		<title>Cella-Cadastro de usuários</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Cella">
		<link href="../bootstrap/vendor/bootstrap/css/botoes.css" rel="stylesheet">
		<link href="../bootstrap/vendor/bootstrap/css/divs.css" rel="stylesheet">
		<!--   Fundo rosa   <link rel="stylesheet" href="../style.css">   -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		</head>
		<style>
		.form-control{
			width: 20%;
			}
		.btn-primary{
			width: 15%;
			}
	</style>
	<body>
	<br>
	<br>
	<hr>
	<h3 align='center'>Editar usuario</h3>
	<hr>
	<center>
		<form action="#" method="POST" class="editar">
			<input type="hidden" name="id_prf" value="<?echo $id;?>">
			<br><br><br><label>Nome:</label><br>
			<input type="text" class="form-control" name="nome" value="<?php echo $nome;?>" required  ><br>
			<br>
			<label>E-mail:</label><br>
			<input type="text" class="form-control" name="email" value="<?php echo $email;?>" required ><br>
			<br>
			<label style =" position:absolute;top:63%;left:41%;">Número:</label><br>
			<input type="number" class="form-control" style ="position:absolute;top:67%;left:41%;width: 6%;" name="numero" value="<?php echo $numero;?>" required  ><br>
			<br>
			<label style =" position:absolute;top:63%;left:50%;">Cargo:</label><br>
			<select class="form-control" name="tipo_user" style =" position:absolute;top:67%;left:50%;width:10%;"  ><br>
			<?php
				foreach($user as $u){
					$id_tipo  = $u['tipo_usuario'];
					$nome_usuario = $u['nome_usuario'];
					if( $tipo  == $id_tipo)
						echo "<option value='$tipo' selected>".$nome_tipo."</option>";
					else
						echo "<option value='$id_tipo'>".$nome_usuario."</option>";
				}
			?>
			</select><br>
			<br>
			<input type="submit" class="btn btn-primary" name="editar" Value="Editar">
		</form>
	</center>
	</body>
</html>