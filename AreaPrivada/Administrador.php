<?php
include_once("../PoderAdm/usuario_prod.php");
include_once("../banco_login/usuarios.php");
include_once("../Cad_usuario/conexao.php");

session_start();//abre a sessão 
if(!isset($_SESSION['id_usuarios'])){//caso estiver indefinida,não possui um id_usuarios
    header("location:../index.php");
    exit;//vai voltar para tela de login
}else if($_SESSION['nivel'] != 1){
    header("location: Colaborador.php");
}



 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador </title>
</head>
<body>
    <div class="container">
    <a href="../PoderAdm/deslogar.php"><button>Deslogar</button></a><!--esse botão ira deslogar o usuario-->
    <a href="../PoderAdm/cadastro_prod.php"><button>Cadastrar Produto</button></a>
    <a href="../Cad_usuario/cadastro.php"><button>Novo Usuario</button></a>

   
    
        <br>
        <?php
           $result_usu = "SELECT * FROM produto";
           $resultado_usu = mysqli_query($conn, $result_usu);
            while($row_usuario = mysqli_fetch_assoc($resultado_usu)){
                echo "Caixa:" . $row_usuario ['numero_caixa'] ;
                echo "    Nome:" . $row_usuario ['nome'] ;
                echo "Descrição:" . $row_usuario['descricao'];
                echo "    Quantidade:" . $row_usuario ['quant_estoque'] ;
                echo"<a href='../PoderAdm/Editar.php?id_produto=$row_usuario[id_produto]'><button>Editar</button></a>";
                echo"<hr>";
            }
        ?>
    </table>
    

    </div>
</body>
</html>