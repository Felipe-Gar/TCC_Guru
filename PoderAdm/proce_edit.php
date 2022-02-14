<?php
include_once("../Cad_usuario/conexao.php");

$id_produto    = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
$nome          = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$quant_estoque = filter_input(INPUT_POST, 'quant_estoque', FILTER_SANITIZE_NUMBER_INT);
$caixa         = filter_input(INPUT_POST, 'numero_caixa', FILTER_SANITIZE_NUMBER_INT);

//comando de UPDATE
$update_prod = "UPDATE produto SET nome = '$nome', descricao = '$descricao', quant_estoque =
 '$quant_estoque', numero_caixa = '$caixa'  WHERE id_produto = '$id_produto'";



 if ($result_edit = mysqli_query($conn, $update_prod)){
    echo "<script>alert('Produto editado com sucesso ');</script>";
    echo "<script>window.location.href = '../AreaPrivada/Administrador.php'</script>";
}else{
    echo "<script>alert('Produto não foi editado');</script>";
    echo "<script>window.location.href = 'Editar.php?id_produto=$id_produto'</script>";
}
?>