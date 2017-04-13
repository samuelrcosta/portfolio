<?php
$dsn = "mysql:dbname=test;host=localhost;charset=utf8";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Falha na conexão: ".$e->getMessage();
}