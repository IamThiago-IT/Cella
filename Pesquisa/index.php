<!doctype html>
<?php
 
require_once('../conexao.php');
 
$sql = "SELECT * FROM area";
$dados = mysqli_query($conn,$sql) or die(mysql_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);
 
// Verifica se a conexão não funcionou...
if (!$conn) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
}
else {
 
?>

<html>
<head>
<meta charset="utf-8">
<title>Pesquisa</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><!-- Via MaxCDN -->
</head>
 
<body>
<form action="" method="get">
<select name="area" id="area">    
    <option value="" selected = selected>Selecione uma área</option>
    <?php
    if($total > 0) {
        do {
        echo "<option value='".$linha['area_id']."'>".$linha['area_nome']."</option>";
        }while($linha = mysqli_fetch_assoc($dados));
    }
    ?>
</select>
 
<select name="curso" id="curso">
    <option value="" selected = selected>Selecione um curso</option>
</select>
</form>
<script type="text/javascript">
$(document).ready(function(){
    $('#area').change(function(){
        $('#curso').load('cursos.php?area='+$('#area').val() );
 
    });
});
</script>
</body>
</html>
<?php
mysqli_close($conn);
}
?>   