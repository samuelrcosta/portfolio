<?php
$dsn = "mysql:dbname=nacionalmei;host=localhost;charset=utf8";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Falha na conexão: ".$e->getMessage();
}

function registraAcesso($pdo){
    $ip = $_SERVER['REMOTE_ADDR'];
    $tabela = 'conexoes';
    $data = date('Y-m-d H:i:s');
    $sql = $pdo->query("INSERT INTO `$tabela` SET ip = '$ip', data = '$data'");
}


function buscarTotal($tabela, $pdo){
    $sql = $pdo->query("SELECT * FROM `$tabela` order by data desc");
    return $sql;
}

function buscarOcorrencias($pdo, $tabela, $coluna){
    $sql = $pdo->query("SELECT `$coluna`, count(`$coluna`) as repeticoes, MAX(data) as max from `$tabela` GROUP by `$coluna` ORDER BY `max` DESC");
    return $sql;
}
?>