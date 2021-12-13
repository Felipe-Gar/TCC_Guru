<?php
require_once 'banco_login/usuarios.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <form method="POST">
        <label>Cadastrar</label><br>
        <input type="text" name="nome" placeholder="Coloque o nome"><br><br>
        <input type="email" name="email" placeholder="Coloque seu email"><br><br>
        <input type="password" name="senha" placeholder="Crie uma senha "><br><br>
        <input type="password" name="confsenha" placeholder="Confirme sua senha"><br><br>
        <input type="number" name="nivel" placeholder="Indique o nivel" maxlength="2"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    </body>
</html>

    <?php
    //verificar se clicou no botão 
    if(isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $nivel = addslashes($_POST['nivel']);
        $confirmarsenha = addslashes($_POST['confsenha']);
        //verificar se o campo esta preenchido
        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($nivel) && !empty($confirmarsenha)) 
        {
            $u->conectar("system_guru", "localhost", "root", "");
            if ($u->msgErro == "") //se esta tudo certo
            {
                if($senha == $confirmarsenha ) 
                {
                 
                }
            else 
            {
                echo "Erro:".$u->msgErro;
            }
        } else {
            echo "Preencha todos os campos ";
        }
    }
        else{
            echo "Voce não tem Cadastro";
        }
    }
    ?>