<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$dbname = "system_guru";

$conn = mysqli_connect($host, $usuario, $senha, $dbname);

if($conn->connect_errno)
 echo "Falha na conexão: (" . $conn->connect_errno . ")" . $conn->connect_error;
?>