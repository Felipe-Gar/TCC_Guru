<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$dbname = "system_guru";

$conn = mysqli_connect($host, $usuario, $senha, $dbname);

if($conn->connect_errno)
 echo "Falha na conexão: (" . $conn->connect_errno . ")" . $conn->connect_error;

 try{
    //conexão sem a porta
    $pdo = new PDO("mysql::host=$host;dbname=" . $dbname, $usuario, $senha);
    
    //echo "Conexão do banco realizado com sucesso!";
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizado com sucesso!";
}
?>