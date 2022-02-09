<?php
include_once("../banco_login/usuarios.php");
include_once("../PoderAdm/usuario_prod.php");

session_start();//abre a sessão 


$p = new Produto("system_guru", "localhost", "root", "");

$dados = $p->buscar_dados();
 if(count($dados) > 0)
 {
     for($i=0; $i < count($dados) ; $i++){
         foreach ($dados[$i] as $k => $v) {
             if($k != "id_produto");
         }

     }
 }
 

 
?>
