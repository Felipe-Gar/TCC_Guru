<?php
include_once("../Cad_usuario/conexao.php");
session_start();

if (isset($_POST['botao'])) {
    @$quant  = $_POST['quant'];
    @$emprestimo = $_POST['emprestimo'];
    @$produto    = $_POST['escondido'];

    if (empty($quant)) {
        echo "<script>alert('Selecione algum item para emprestar!');</script>";
        echo "<script>window.location.href = 'Emprestimo.php';</script>";
    }  else {

        for ($i = 0; $i < count($emprestimo); $i++) {
            $sql = "SELECT id_produto, quant_estoque FROM produto WHERE nome = '$produto[$i]'";
            $execute = mysqli_query($conn, $sql);

            while ($recebe = mysqli_fetch_assoc($execute)) {
                $id = $recebe['id_produto'];

                if ($emprestimo[$i] < 0) { //caso o a quantidade for menor que zero
                    echo "<script>alert('O valor que você deseja emprestar é maior do que o disponivel!');</script>";
                    echo "<script>window.location.href = 'Emprestimo.php';</script>";

                } else if ($emprestimo[$i] > $quant[$i]) {//caso o emprestimo for maior que aquantidade 
                    echo "<script>alert('O valor que você deseja emprestar e maior que o disponivel!');</script>";
                    echo "<script>window.location.href = 'Emprestimo.php';</script>";

                } else{
                    $resu[$i] = $quant[$i]-$emprestimo[$i];
                    $conta = "UPDATE produto SET quant_estoque = '$resu[$i]' WHERE id_produto = '$id'";

                    if(mysqli_query($conn, $conta)){
                       $insert_empre = "INSERT INTO emprestimos (id_usuarios, data_retirada) VALUES ('$_SESSION[id_usuarios]', NOW())";

                       if(mysqli_query($conn, $insert_empre)){
                           $selec_emp = "SELECT id_emprestimos FROM emprestimos WHERE data_retirada = NOW() AND id_usuarios = '$_SESSION[id_usuarios]'";
                           $exec_emp = mysqli_query($conn, $selec_emp);
                           $result_exec = mysqli_fetch_assoc($exec_emp);

                           $insert_proemp = "INSERT INTO emprestimos_produto (id_emprestimos, id_produto, id_usuarios, quant) VALUES ('$result_exec[id_emprestimos]', '$id', '$_SESSION[id_usuarios]', '$emprestimo[$i]')";
                       
                           if(mysqli_query($conn, $insert_proemp)){
                               echo "<script>alert('SUCESSO');</script>";
                               echo "<script>window.location.href = '../AreaPrivada/Colaborador.php'</script>";
                           }
                       }
                    }else{
                        echo "<script>alert(' Emprestimo falhou ') ;</script>";
                                
                    }
                }
            }
        }
    } 
}