<?php
include_once 'conexao.php';
include_once '../banco_login/usuarios.php';
 session_start();//Caso o usuario copiar a url ele ira ter que voltar para a tela de login
   if(!isset($_SESSION['id_usuarios']))
   {
     header("location: ./index.php");
     exit;
   }
     ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/cadastro.css">
    <title>Cadastro</title>
</head>

<img src="../img/6.png" id="img3">

<body>
<form> 
<h2> Formulário de Cadastro </h2>
    <div class= "text-center">
    <form method="POST">  
        <label  id="labelnome">NOME</label><br>
        <input type="text" name="nome" id="nome" placeholder="digite o nome"><br><br>

        <label for=""id="email1">E-MAIL</label><br>
        <input type="email" name="email" id="email" placeholder="usuario@gmail.com"><br><br>

        <label for="" id="criarsenha1">CRIAR SENHA</label><br>
        <input type="password" name="senha" id="senha" placeholder="Crie uma senha "><br><br>

        <label for=""id="confsenha1">CONFIRMAR SENHA</label><br>
        <input type="password" name="confsenha" id="confsenha" placeholder="Confirme sua senha"><br><br>
        <select class = "form-select" name="nivel" id="nivel" aria-label="Default select example">
            <option>Selecione</option>
  </div>
  <div class="botao">
<input type="submit" name="botao" class="btn_enviar" value="Cadastrar" id="botao">
        </div>
            <?php
            $resultadoGrupo = "SELECT * FROM grupo_usuarios";
            $re_grupo = mysqli_query($conn, $resultadoGrupo);
            while($row_grupo = mysqli_fetch_assoc($re_grupo)){?> 
            <option value ="<?php echo $row_grupo['id_grupo_usuarios']?>">
                <?php echo $row_grupo['nome_grupo'];?>
            </option><?php
            }
            ?>
        </select><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>

<?php
require_once '../banco_login/usuarios.php';
$u = new Usuario;
//verificar se clicou no botão 
if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $id_grupo = addslashes($_POST['id_grupo']);
    $confirmarsenha = addslashes($_POST['confsenha']);
    //verificar se o campo esta preenchido
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($id_grupo) && !empty($confirmarsenha)) {
        $u->conectar("system_guru", "localhost", "root", "");
        if ($u->msgErro == "") //se esta tudo certo
        {
            if ($senha == $confirmarsenha) {//Ver se senha e confirmarsenha são iguais
                if ($u->cadastrar($nome, $email, $senha, $id_grupo)) {
                    echo "<script>alert('Cadastrado com Sucesso');</script> ";
                } else {
                    echo "Email ja cadastrado ";
                }
            } else {
                echo "Senha e Confirmar senha não são as mesmas ";
            }
        } else {
            echo  "Erro:" . $u->msgErro;
        }
    } else {
        echo "Preencha todos os campos";
    }
}

?>