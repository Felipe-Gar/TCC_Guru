<?php
Class Usuario
{
    private $pdo ;
    public $msgErro="";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try
        {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }
    public function cadastrar($nome, $email, $nivel, $senha)
    {
        global $pdo;
        global $msgErro;
        //verificar se o usuario esta cadastrado 
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios WHERE email = :e ");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;//ja esta cadastrado
        }
        else{
            //caso nao esteja cadastrado 
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:n, :e, :s, :i)" );
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", $senha);
            $sql->bindValue(":i", $nivel);
            $sql->execute();
            return true ;
        }
        //caso não,Procurar o administrador 
    }  
    public function logar($nome, $senha)
    {
        global $pdo;
        global $msgErro;
        //verificar se o nome e senha esta cadastrado ou nao 
    }
}
?>