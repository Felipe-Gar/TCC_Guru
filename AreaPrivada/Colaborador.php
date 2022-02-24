<?php
include_once("../banco_login/usuarios.php");
include_once("../PoderAdm/usuario_prod.php");

session_start(); //abre a sessão 
if (!isset($_SESSION['id_usuarios'])) { //caso estiver indefinida,não possui um id_usuarios
   header("location:../index.php");
    exit; //vai voltar para tela de login
} else if ($_SESSION['id_grupo'] != 2) {
    header("location: Administrador.php");
}

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Colaborador.css">
    <title>Document</title>
</head>
<img src="../img/6.png" id="img3">

<body>
    <header>
    <a  href="../PoderAdm/deslogar.php"><button class="btn_deslogar" >Deslogar</button></a>

<a href='../PoderAdm/Emprestimo.php'><button class="btn_enviar" >Emprestar</button></a>
<a href='../PoderAdm/devolucao.php'><button class="btn_dev" >Devolver</button></a>
</header>
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
     
     </td>
     ";
 }

 
?>
</tbody>
</table>
<div class="link2">
        <a href="../banco_login/ajuda.html">
            <p id="cadastrohr"> Ajuda</p>
        </a>

</body>
</html>