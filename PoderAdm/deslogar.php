<?php
    session_start(); // inicia a sessão...
    unset($_SESSION['id_usuarios']); //derruba sessão
    header("location: ../index.php"); //manda o usuario para tela de login

?>