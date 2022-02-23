<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Css/style.css">
    <title>Login</title>
</head>
<body>
<img src="img/6.png" id="img2">
    <form method="POST">
    <div class="container">
        <div class="usuario">
            <label for="text" id="labeluser">USUÁRIO</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite seu usuário">
            </div>
           <div class="senha">
            <label for="text" id="labelsenha">SENHA</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="Digita sua senha">
           </div>
            <div class="" id="botao">
            <input type="submit" name="botao" value="ENTRAR" id="btn" class="btn btn-primary" >
           </div>
        </form>

           </div>
            <div class="link2">
            <a href="ajuda/ajuda.html">
                <p id="cadastrohr"> Ajuda</p>
            </a>
            </div>
    <!-- BLOCO DE PHP -->
<?php
require_once 'banco_login/usuarios.php';

$u = new Usuario;

if (isset($_POST['nome'])) { 
  $nome = addslashes($_POST['nome']); 
  $senha = addslashes($_POST['senha']);

  if(!empty($nome) && !empty($senha)){
      $u->conectar("system_guru", "localhost", "root", "");
      if($u->msgErro == ""){
          if(!$u->logar($nome, $senha)){
              echo "<script>alert('Login errado!');</script>";
          }
      } else{
          echo "Erro: " . $u->msgErro;
      }
  } else{
      echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
  }
}
?>
</body>
</html>