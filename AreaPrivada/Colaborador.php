<?php
include_once("../banco_login/usuarios.php");
include_once("../PoderAdm/usuario_prod.php");

session_start(); //abre a sessão 
if (!isset($_SESSION['id_usuarios'])) { //caso estiver indefinida,não possui um id_usuarios
    header("location:../index.php");
    exit; //vai voltar para tela de login
} else if ($_SESSION['id_grupo'] != 2) {
    header("location: Colaborador.php");
}
echo "<a href='../PoderAdm/Emprestimo.php'><button>Emprestar</button></a></br>";
echo "<a href='../PoderAdm/devolucao.php'><button>Devolver</button></a></br>";
?>
<table>
<thead>
    <tr>
        <th id="caixa">Caixa</th>
        <th id="Nome">Nome</th>
        <th id="descricao">Descrição</th>
        <th id="quantidade">Quantidade</th>
    </tr>

</thead>
<tbody>
    <?php




$result_usu = "SELECT * FROM produto";
$resultado_usu = mysqli_query($conn, $result_usu);
 while($row_usuario = mysqli_fetch_assoc($resultado_usu)){
     echo"<tr>";
     echo "<td>" . $row_usuario ['numero_caixa'] ;
     echo " <td>" . $row_usuario ['nome'] ;
     echo "<td>" . $row_usuario['descricao'];
     echo " <td>" . $row_usuario ['quant_estoque'] ;
     echo"<td>
     <hr>
     </td>
     ";
 }

 
?>
</tbody>
</table>
