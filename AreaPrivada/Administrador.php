<?php
include_once("../PoderAdm/usuario_prod.php");
include_once("../banco_login/usuarios.php");
include_once("../Cad_usuario/conexao.php");

session_start(); //abre a sessão 
if (!isset($_SESSION['id_usuarios'])) { //caso estiver indefinida,não possui um id_usuarios
    header("location:../index.php");
    exit; //vai voltar para tela de login
} else if ($_SESSION['nivel'] != 1) {
    header("location: Colaborador.php");
}




?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Administrador </title>
</head>

<body>
    <div class="container">
        <a href="../PoderAdm/deslogar.php"><button>Deslogar</button></a>
        <!--esse botão ira deslogar o usuario-->
        <a href="../PoderAdm/cadastro_prod.php"><button>Cadastrar Produto</button></a>
        <a href="../Cad_usuario/cadastro.php"><button>Novo Usuario</button></a>



        <br>
        <?php
        $result_usu = "SELECT * FROM produto";
        $resultado_usu = mysqli_query($conn, $result_usu); ?>
        <table>
            <thead>
                <tr>
                    <th id="caixa">Caixa</th>
                    <th id="Nome">Nome</th>
                    <th id="descricao">Descrição</th>
                    <th id="quantidade">Quantidade</th>
                </tr>

            </thead>
            <tbody>
                <?php
                while ($row_usuario = mysqli_fetch_assoc($resultado_usu)) {
                    echo "<tr>";
                    echo "<tr><input type='hidden' value='$row_usuario[id_produto]'></tr>";
                    echo "<td>" . $row_usuario['numero_caixa'];
                    echo "<td>" . $row_usuario['nome'];
                    echo "<td>" . $row_usuario['descricao'];
                    echo "<td>" . $row_usuario['quant_estoque'];
                    echo "<td>
                        <a href='../PoderAdm/Editar.php?id_produto=$row_usuario[id_produto]'>
                            <button>Editar</button>
                        </a>
                        |
                        <a href='../PoderAdm/proce_excluir.php?id_produto=" . $row_usuario['id_produto'] . "' data-confirm='Tem certeza que deseja excluir o item selecionado?'>
                           <button>Excluir</button>
                        </a>
                       
                        <hr>
                           </td>";
                }
                ?>


            </tbody>
        </table>


    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../PoderAdm/controler.js"></script>

</body>

</html>