<?php
session_start();
require 'config.php';
$tabela = $_SESSION['tabela'];
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1) {
    if ($_SESSION['permissao'] == 1) {
        if (isset($_GET['n']) && empty($_GET['n']) == false) {
            $n = base64_decode(base64_decode($_GET['n']));
            $sql = "DELETE FROM `$tabela` WHERE n='$n'";
            $sql = $pdo->query($sql);
            $_SESSION['retorno'] = 4;
            echo 1;
        }else{
            echo -1;
        }
    }else{
        $_SESSION['retorno'] = 8;
        header("Location:home");
    }
} else{
    $_SESSION['retorno'] = 6;
    header("Location:login");
}
?>