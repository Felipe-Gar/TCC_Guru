<?php
include_once("../banco_login/usuarios.php");
include_once("../PoderAdm/usuario_prod.php");

session_start();//abre a sessão 

$result_usu = "SELECT * FROM produto";
$resultado_usu = mysqli_query($conn, $result_usu);
 while($row_usuario = mysqli_fetch_assoc($resultado_usu)){
     echo "Caixa:" . $row_usuario ['numero_caixa'] ;
     echo "    Nome:" . $row_usuario ['nome'] ;
     echo "Descrição:" . $row_usuario['descricao'];
     echo "    Quantidade:" . $row_usuario ['quant_estoque'] ;
     echo"<a href='../PoderAdm/Editar.php?id_produto=$row_usuario[id_produto]'><button>Emprestar</button></a>";
     echo"<hr>";
 }

?>
