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
            $msgErro = $e->getMessage(""); 
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
        else{
        //caso nao estiver cadastrado
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:n, :e, :s, :i)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->bindValue(":i",$nivel);
        $sql->execute();
        
        return true; //cadastrado com sucesso
        }
    }

    public function logar($usuario, $senha){ 
        global $pdo; 
        global $msgErro; 
      
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios WHERE nome = :n AND senha = :s");
        $sql->bindValue(":n",$usuario);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0 ){
            //entrar na sessao
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuarios'] = $dado['id_usuarios'];

            $verificar = $pdo->query("SELECT * FROM usuarios");
            while($linha = $verificar->fetch(PDO::FETCH_ASSOC)){
                if($linha['id_usuarios'] == $_SESSION['id_usuarios']){
                    $nivel = $linha ['nivel'];

                    switch ($nivel){

                        case'1';
                        header("location: ./AreaPrivada/Administrador.php");
                        break;

                        case'2';
                        header("location: ./AreaPrivada/Colaborador.php");
                        break;

                        default:
                        echo "Usuario sem acesso" ;
                        header("location: ../index.php");
                        break;
                    }
                    $_SESSION['nivel'] = $nivel;
                }
            }
            return true;
        }else{
            return false;
        }
    }
}

?>