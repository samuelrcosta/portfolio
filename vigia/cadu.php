<?php
session_start();
require 'config.php';
if(isset($_POST['email']) && empty($_POST['email']) == false){
    $email = addslashes($_POST['email']);
    $sql = "SELECT email FROM usuarios WHERE email = '$email'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        echo "E-mail já cadastrado";
    } else{
        if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){
            $usuario = $_POST['usuario'];
            if(isset($_POST['aluno']) && empty($_POST['aluno']) == false) {
                $aluno = $_POST['aluno'];
                if(isset($_POST['senha']) && empty($_POST['senha']) == false) {
                    $senha = $_POST['senha'];
                    if(isset($_POST['confsenha']) && empty($_POST['confsenha']) == false) {
                        $confsenha = $_POST['confsenha'];
                        if ($senha == $confsenha){
                            $data = date('Y-m-d H:i:s');
                            $sql = "INSERT INTO usuarios(nome,email, senha, permissao, aluno, dt_cadastro) VALUES ('$usuario','$email','$senha',1,'$aluno','$data')";
                            $sql = $pdo->query($sql);
                            $sql2 = "SELECT id FROM usuarios WHERE email = '$email'";
                            $sql2 = $pdo->query($sql2);
                            if($sql2->rowCount() > 0){
                                $id = $sql2->fetch()['id'];
                                $tabela = $id."_provas";
                                $sql3 = "CREATE TABLE `$tabela` (
                                n int(11) NOT NULL AUTO_INCREMENT,
                                dia int(11) NOT NULL,
                                mes int(11) NOT NULL,
                                materia varchar(30) COLLATE utf8_unicode_ci NOT NULL,
                                professor varchar(30) COLLATE utf8_unicode_ci NOT NULL,
                                entregue int(11) NOT NULL DEFAULT '0',
                                nota float DEFAULT NULL,
                                anotacoes varchar(200) COLLATE utf8_unicode_ci NOT NULL,
                                tipo int(11) NOT NULL,
                                bimestre int(11) NOT NULL,
                                dt_cadastro TIMESTAMP NOT NULL,
                                PRIMARY KEY (n),
                                UNIQUE id (n)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
                                $sql3 = $pdo->query($sql3);
                                $sql = "UPDATE usuarios SET tabela = '$tabela' WHERE id = '$id'";
                                $sql = $pdo->query($sql);
                                $_SESSION['id'] = $id;
                                $_SESSION['permissao'] = 1;
                                $_SESSION['tabela'] = $tabela;
                                $_SESSION['nome'] = $usuario;
                                $_SESSION['retorno'] = 5;
                                echo "1";
                            }else{
                                echo "Problema ao consultar o usuário cadastrado";
                            }
                        }
                        else{
                            echo "As senhas não conferem";
                        }
                    }
                }
            }
        }
    }
}

?>