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
    public function cadastrar($nome, $email, $senha, $nivel){
        global $pdo;
        global $msgErro;

        //verifica se o nome ja esta cadastrado
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios WHERE nome = :n");
        $sql->bindValue(":n",$nome);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;//ja esta cadastrado
        }
        //caso nao estiver cadastrado
        $sql = $pdo->prepare("INSERT INTO usuarios ($nome, $email, $senha, $nivel) VALUES (:n, :e, :s, :i)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":s",md5($senha));
        $sql->bindValue(":i",$nivel);
        $sql->bindValue(":e",$email);
        $sql->execute();
        return true; //cadastrado com sucesso
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
            return true;//logado com sucesso
        } else{
            return false;
        }
    }
}

?>