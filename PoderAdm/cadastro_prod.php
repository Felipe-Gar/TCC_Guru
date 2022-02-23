<?php
 require_once "usuario_prod.php";
 $p = new Produto("system_guru", "localhost", "root", "");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/cadastro.css">k
    <title>Cadastrar Produto</title>
</head>

<body>
    <header>    <a  href="../AreaPrivada/Administrador.php"><button id="inicio">Inicio</button></a>
</header>

    <form method="POST">
        <label >Cadastro Produto</label><br><br>
        <input type="text" name="nome" placeholder="Insira o nome do Produto"><br><br>
        <input type="text" name="descricao" placeholder="Insira uma descrição "><br><br>
        <input type="number" name="quant_estoque" placeholder="Quantidade em estoque" maxlength="4"><br><br>
        <input type="number" name="caixa" placeholder="Insira a caixa do produto" maxlength="3"><br><br>
        <input type="submit" value="Cadastrar">




    </form>
</body>
</html>
<?php
    require_once "usuario_prod.php";
    $p = new Produto;
     //verificar se clicou no botão
    if (isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $descricao = addslashes($_POST['descricao']);
        $quant_estoque = addslashes($_POST['quant_estoque']);
        $caixa = addslashes($_POST['caixa']);
        //verificac se o campo esta preenchido
        if(!empty($nome) && !empty($descricao) && !empty($quant_estoque) &&  !empty($caixa) ){
          $p->conectar("system_guru", "localhost", "root","");//conectando bd
          if($p->MsgErro == "")//se esta tudo certo
             {
                 if($p->cadastrar($nome,  $descricao, $quant_estoque, $caixa)){
                     echo "<script>alert('Cadastrado com Sucesso');</script>";
                 }else{
                     echo "<script>alert('Este produto já foi cadastrado');</script>";
                 }
             }else{
                 echo"Erro:" . $u->msgErro;
             }
        }else{
            echo "Preencha todos os campos";
        }
    }

?>