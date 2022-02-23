<?php
require_once "../Cad_usuario/conexao.php";
Class Produto {
    private $pdo;
    public $MsgErro = "";

public function conectar($dbname, $host, $usuario, $senha){

    global $pdo; 
    global $MsgErro; 
    
    try{
        $pdo =  new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $usuario, $senha);
    }catch (PDOException $e) { 
        $MsgErro = $e->getMessage(""); 
    }
}
public function cadastrar($nome, $descricao, $quant_estoque, $caixa){
    global $pdo;
    global $MsgErro;

    //verifica se o nome ja esta cadastrado
    $sql = $pdo->prepare("SELECT id_produto FROM produto WHERE nome = :n");
    $sql->bindValue(":n",$nome);
    $sql->execute();
    if($sql->rowCount() > 0)
    {
        return false;//ja esta cadastrado
    }
    else{
    //caso nao estiver cadastrado
    $sql = $pdo->prepare("INSERT INTO produto (nome, descricao, quant_estoque,  numero_caixa) VALUES (:n, :d, :e, :c)");
    $sql->bindValue(":n",$nome);
    $sql->bindValue(":d",$descricao);
    $sql->bindValue(":e",$quant_estoque);
    $sql->bindValue(":c",$caixa);
    $sql->execute();
    
    return true; //cadastrado com sucesso
    }

}
   public function buscar_dados(){//buscar e retornar os dados  
   global $pdo;
       $result = array();//se retorna vazio não der erro
       $sql = $this->$pdo->prepare("SELECT * FROM produto ORDER BY nome");
       $result = $sql->fetchAll(PDO::FETCH_ASSOC);
       return $result;
   }
}

?>