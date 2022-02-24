<?php
session_start();
include_once("../banco_login/usuarios.php");
if (!isset($_SESSION['id_usuarios'])) { //caso estiver indefinida,não possui um id_usuarios
  header("location:../index.php");
   exit; //vai voltar para tela de login
} else if ($_SESSION['id_grupo'] != 2) {
    header("location: Colaborador.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/emprestimo.css">
    <title>Emprestimo</title>
</head>
<a  href="../AreaPrivada/Administrador.php"><button class="inicio">Inicio</button></a>
<img src="../img/6.png" id="img3">

<body>
    <div class="form-control">
        <h1>Pesquisar</h1>
        <form method="POST" id="form_pesquisa" action="">
           
            <input type="text" id="pesquisa" name="pesquisa" placeholder="Digite o nome de usuario">

        </form>
        <ul class="resultado">

        </ul>

    </div>
    <h1 class="form-h1">Emprestimo</h1>
    <div>
        <form action="Empresta.php" method="POST">
            <div class="form-emp">
                <table id="emprestimo">
                    <thead>
                        <tr>
                            <td>Caixa</td>
                            <td>Nome</td>
                            <td>Quantidade</td>
                            <td>Emprestimo</td>

                        </tr>
                    </thead>
  
                </table>
            </div>

            <div id="result">
                

            </div>
            <input type="submit" class="form-button" name="botao" value="Emprestar">
        </form>
        <div class="link2">
        <a href="ajuda/ajuda.html">
            <p id="cadastrohr"> Ajuda</p>
        </a>

    </div>
   
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="emprestar.js"></script>
</body>

</html>