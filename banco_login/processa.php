<?php
include_once("conexao.php");

$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO usuarios (nome ,senha) VALUES ('$nome',md5('$senha'))";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    header("location: ../principal.php");
}else{
    header("location: erro.php");
}

?>