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
    <title>Cadastro</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="nome" placeholder="Coloque o nome"><br><br>
        <input type="email" name="email" placeholder="Coloque seu email"><br><br>
        <input type="password" name="senha" placeholder="Crie uma senha "><br><br>
        <input type="password" name="confsenha" placeholder="Confirme sua senha"><br><br>
        <select class = "form-select" name="nivel" aria-label="Default select example">
            <option>Selecione</option>
            <?php
            $resultadoGrupo = "SELECT * FROM grupo_usuarios";
            $re_grupo = mysqli_query($conn, $resultadoGrupo);
            while($row_grupo = mysqli_fetch_assoc($re_grupo)){?> 
            <option value ="<?php echo $row_grupo['nivel']?>">
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
    $nivel = addslashes($_POST['nivel']);
    $confirmarsenha = addslashes($_POST['confsenha']);
    //verificar se o campo esta preenchido
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($nivel) && !empty($confirmarsenha)) {
        $u->conectar("system_guru", "localhost", "root", "");
        if ($u->msgErro == "") //se esta tudo certo
        {
            if ($senha == $confirmarsenha) {//Ver se senha e confirmarsenha são iguais
                if ($u->cadastrar($nome, $email, $senha, $nivel)) {
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