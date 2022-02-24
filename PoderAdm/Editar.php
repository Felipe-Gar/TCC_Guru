<?php
include_once("../Cad_usuario/conexao.php");

$id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);

$cons = "SELECT * FROM produto WHERE id_produto = '$id_produto'";
$exec = mysqli_query($conn, $cons);
$edit = mysqli_fetch_assoc($exec);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/editar.css">
    <title>Editar Produto</title>
</head>
<img src="../img/6.png" id="img3">

<a  href="../AreaPrivada/Administrador.php"><button class="btn_editar" id="inicio">Inicio</button></a>

<body>
    
    <div class="labeldiv">
    <form name="form" method="POST" action="proce_edit.php">
        <input type="hidden" name="id_produto" value="<?php echo $edit['id_produto'] ?>">

        <label name="labelcaixa">Caixa</label><br> 
        <input type="number" name="numero_caixa" value="<?php echo $edit['numero_caixa'] ?>"><br>

        <label>Nome</label><br> 
        <input type="text" name="nome" value="<?php echo $edit['nome'] ?>"><br>

        <label>Descrição</label><br> 
        <textarea type="text" name="descricao"><?php echo $edit['descricao'] ?></textarea><br>

        <label>Quantidade</label><br> 
        <input type="number" name="quant_estoque" value="<?php echo $edit['quant_estoque'] ?>"><br><br>

        <input type="submit" value="Editar" class="btn_entrar"  name="editar">
        

</div>

    </form>
    <div class="link2">
        <a href="../banco_login/ajuda.html">
            <p id="cadastrohr"> Ajuda</p>
        </a>
</div>

</body>

</html>