<?php
class Usuario{
    private $id;
    private $nome;
    private $senha;
    private $email;

    private $pdo;

    public function __construct($i = ""){
        try{
            $this->pdo = new PDO("mysql:dbname=gaasa;host=localhost;charset=utf8", "root", "root");
        }catch (PDOException $e){
            echo "FALHOU: ".$e->getMessage();
        }
        if(!empty($i) || $i != ""){
            $sql = "SELECT * FROM usuarios_gaasa WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($i));

            if($sql->rowCount() > 0){
                $data = $sql->fetch();
                $this->email = $data['email'];
                $this->senha = $data['senha'];
                $this->nome = $data['nome'];
                $this->id = $data['id'];
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function salvar(){
        if(!empty($this->id)){
            $sql = "UPDATE usuarios_gaasa SET email = ?, senha = ?, nome = ? WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->email, $this->senha, $this->nome, $this->id));
        } else{
            $sql = "INSERT INTO usuarios_gaasa SET email = ?, senha = ?, nome = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->email, $this->senha, $this->nome));
        }
    }

    public function delete(){
        $sql = "DELETE FROM usuarios_gaasa WHERE id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($this->id));
    }
}