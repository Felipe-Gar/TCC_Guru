<?php
session_start();
include_once("../Cad_usuario/conexao.php");
$id_produto =  filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);;
 $result_prod="DELETE FROM  produto WHERE id_produto = $id_produto";
 $prod_res=mysqli_query($conn, $result_prod);

 if(mysqli_affected_rows($conn)){
    echo "<script>alert('Produto excluido com sucesso ');</script>";
    echo "<script>window.location.href = '../AreaPrivada/Administrador.php'</script>";

 }else{
    echo "<script>alert('Produto não foi apagado com sucesso');</script>";
    echo "<script>window.location.href = '../AreaPrivada/Administrador.php'</script>";

 }
?>