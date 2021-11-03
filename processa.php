<?php
include_once("conexao.php");

$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO usuarios (nome ,email) VALUES ('$nome','$senha')";
$resultado_usuario = mysqli_query($conn, $result_usuario);
?>