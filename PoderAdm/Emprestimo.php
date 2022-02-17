<?php
session_start();
include_once("../banco_login/usuarios.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprestimo</title>
</head>

<body>
    <div>
        <h1>Pesquisar</h1>
        <form method="POST" id="form_pesquisa" action="">
            <label>Pesquisar</label>
            <input type="text" id="pesquisa" name="pesquisa" placeholder="Digite o nome de usuario">

        </form>
        <ul class="resultado">

        </ul>

    </div>
    <h1>Emprestimo</h1>
    <div>
        <form>
            <div>
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
            <input type="submit" name="botao" value="Emprestar">
    </div>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="emprestar.js"></script>
</body>

</html>