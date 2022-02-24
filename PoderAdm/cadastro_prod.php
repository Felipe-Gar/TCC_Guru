<?php
 require_once "usuario_prod.php";
 session_start();
include_once("../banco_login/usuarios.php");
if (!isset($_SESSION['id_usuarios'])) { //caso estiver indefinida,não possui um id_usuarios
    header("location:../index.php");
    exit; //vai voltar para tela de login
} else if ($_SESSION['id_grupo'] != 1) {
    header("location: ../AreaPrivada/Colaborador.php");
}

 $p = new Produto("system_guru", "localhost", "root", "");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/cadproduto.css">
    <title>Cadastrar Produto</title>
</head>
<a href="../AreaPrivada/Administrador.php">
                    <button class="btn_enviar" name="inicio" id="inicio">Inicio</button>
                </a>

<img src="../img/6.png" id="img9">


<body>
    <form method="POST">
        <div id="titulo">
        <h1 >Cadastro Produto</h1><br><br>
</div>
        <label for=""id="produto1">Produto</label><br>
        <input type="text" id="produto2" name="nome" placeholder="Insira o nome do Produto"><br><br>

        <label for=""id="descricao1">Descrição</label><br>
        <input type="text" id="descricao2" name="descricao" placeholder="Insira uma descrição "><br><br>

        <label for=""id="estoque1">Quantidade</label><br>
        <input type="number" id="estoque2" name="quant_estoque" placeholder="Quantidade em estoque" maxlength="4"><br><br>
<div id="caixaa">
        <label for=""id="caixa1">Caixa</label><br>
        <input type="number" id="caixa2" name="caixa" placeholder="Insira a caixa do produto" maxlength="3"><br><br>
        <input type="submit" id="cadastro1" value="Cadastrar">
</div>




    </form>
    <div class="link2">
        <a href="../banco_login/ajuda.html">
            <p id="cadastrohr"> Ajuda</p>
        </a>


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
        if(!empty($nome) && !empty($descricao) && !empty($quant_estoque)  && !empty($caixa) ){
          $p->conectar("system_guru", "localhost", "root","");//conectando bd
          if($p->MsgErro == "")//se esta tudo certo
             {
                 if($p->cadastrar($nome,  $descricao, $quant_estoque, $caixa)){
                     echo "<script>alert('Cadastrado com Sucesso');</script>";
                 }else{
                     echo "<script>alert('Ja foi cadastrado');</script>";
                 }
             }else{
                 echo"Erro:" . $u->msgErro;
             }
        }else{
            echo "<script>alert('Prencha todos os campos');</script>";
        }
    }

?>