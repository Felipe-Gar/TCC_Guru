<?php
include_once("../Cad_usuario/conexao.php");
session_start();

if (isset($_POST['botao'])) {
    @$quant    = $_POST['quant'];
    @$devolver = $_POST['devolver'];
    @$produto  = $_POST['escondido'];

    if (empty($quant)) {
        echo "<script>alert('Selecione algum item para devolver!');</script>";
        echo "<script>window.location.href = 'devolucao.php';</script>";
    } else {

        for ($i = 0; $i < count($devolver); $i++) {
            $sql = "SELECT id_produto, quant_estoque FROM produto WHERE nome = '$produto[$i]'";
            $execute = mysqli_query($conn, $sql);

            while ($recebe = mysqli_fetch_assoc($execute)) {
                $id = $recebe['id_produto'];
                $resu[$i] = $quant[$i] + $devolver[$i];
                $conta = "UPDATE produto SET quant_estoque = '$resu[$i]' WHERE id_produto = '$id'";

                if (mysqli_query($conn, $conta)) {
                    echo "<script>alert('SUCESSO');</script>";
                    echo "<script>window.location.href = '../AreaPrivada/Colaborador.php'</script>";
                } else {
                    echo "<script>alert(' A devolução falhou ') ;</script>";
                }
            }
        }
    }
}
