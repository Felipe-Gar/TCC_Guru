<?php

Class Usuario{  
    private $pdo; 
    public $msgErro = "";

    public function conectar($dbname, $server, $usuario, $senha){ 
        global $pdo; 
        global $msgErro; 
        
        try{
            $pdo =  new PDO("mysql:dbname=" . $dbname . ";host=" . $server, $usuario, $senha);
        }catch (PDOException $e) { 
            $msgErro = $e->getMessage(); 
        }
        
    }

    public function logar($usuario, $senha){ 
        global $pdo; 
        global $msgErro; 
      
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios WHERE nome = :n AND senha = :s");
        $sql->bindValue(":n",$usuario);
        $sql->bindValue(":s",md5($senha));
        $sql->execute(); 
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuarios'] = $dado['id_usuarios']; 
            return true;
        } else{
            return false;
        }
    }
}

?>