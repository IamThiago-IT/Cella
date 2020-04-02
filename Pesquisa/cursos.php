<?php
include "../conexao.php";
 
$area_id = $_GET['area'];
$sql = "SELECT * FROM u277754222_cella WHERE curso_area = $area_id";
$dados = mysqli_query($conn,$sql) or die(mysqli_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);
if($total > 0) {
        do {
        echo "<option value='".$linha['curso_id']."'>".$linha['curso_nome']."</option>";
        }while($linha = mysqli_fetch_assoc($dados));
    }
?>