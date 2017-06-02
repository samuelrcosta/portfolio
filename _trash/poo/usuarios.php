<?php
class Usuarios{
    private $db;

    public function __construct(){
        try{
            $this->db = new PDO("mysql:dbname=gaasa;host=localhost;charset=UTF8", "root", "root");
        }catch (PDOException $e){
            echo "FALHA: ".$e;
        }
    }

    public function selecionar($id){
        $sql = $this->db->prepare("SELECT * FROM usuarios_gaasa WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $array = array();
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function inserir($nome, $email, $senha){
        $sql = $this->db->prepare("INSERT INTO usuarios_gaasa SET nome = :nome, email = :email, senha = :senha");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);

        $sql->execute();
    }

    public function atualizar($nome, $email, $senha, $id){
        $sql = $this->db->prepare("UPDATE usuarios_gaasa SET nome = ?, email = ?, senha = ? WHERE id = ?");
        $sql->execute(array($nome, $email, $senha, $id));
    }

    public function excluir($id){
        $sql = $this->db->prepare("DELETE FROM usuarios_gaasa WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }
}