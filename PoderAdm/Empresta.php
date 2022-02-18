<?php
include_once("../Cad_usuario/conexao.php");
session_start();

if (isset($_POST['botao'])) {
    $quantdisp  = $_POST['quant'];
    $emprestimo = $_POST['emprestimo'];
    $produto    = $_POST['escondido'];

    if (empty($quantdisp)) {
        echo "<script>alert('Selecione algum item para emprestar!');</script>";
        echo "<script>window.location.href = 'Emprestimo.php';</script>";
    }  else {
        for ($i = 0; $i < count($emprestimo); $i++) {
            $sql = "SELECT id_produto, quant_estoque FROM produto WHERE nome = '$produto[$i]'";
            $execute = mysqli_query($conn, $sql);
            while ($recebe = mysqli_fetch_assoc($execute)) {
                $id = $recebe['id_produto'];
                if ($emprestimo[$i] < 0) {
                    echo "<script>alert('O valor que você deseja emprestar é maior do que o disponivel!');</script>";
                    echo "<script>window.location.href = 'Emprestimo.php';</script>";
                } else if ($emprestimo[$i] > $quantdisp[$i]) {
                    echo "<script>alert('O valor que você deseja emprestar e maior que o disponivel!');</script>";
                    echo "<script>window.location.href = 'Emprestimo.php';</script>";
                }
            }
        }
    } 
}
