<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="banco_login/style.css">
    <title>Login</title>
</head>
<body>
    <div id="corpo-form">
      <h1>Logar</h1>
      <form method="POST"> 
          <label>Usuario:</label>
          <input type="text" name="nome" placeholder="Nome de Usuario">
          </br>
          </br>
          <label>Senha:</label>
          <input type="password" name="senha" placeholder="Coloque sua senha">
          </br>
          </br>
          </br>
          <input type="submit" value="Logar">  
      </form>
    </div>
    <!-- BLOCO DE PHP -->
<?php
require_once 'banco_login/usuarios.php';
$u = new Usuario;
if (isset($_POST['nome'])) { 
  $nome = addslashes($_POST['nome']); 
  $senha = addslashes($_POST['senha']);

  if (!empty($nome) && !empty($senha)) { 
      $u->conectar("system_guru", "localhost", "root", ""); 
      if ($u->msgERRO == "") { 
          if ($u->logar($nome, $senha)) {
              header("location: principal.php");
          } else {                                        
              echo "Usúario e/ou senha incorretos!";
          }
      } else {
          echo "Erro: " . $u->msgERRO;
      }
  } else { 
      echo "Preencha todos os campos!";
  }
}
?>
</body>
</html>