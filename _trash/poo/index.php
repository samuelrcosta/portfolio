<?php
require 'banco.php';
require 'usuarios.php';
date_default_timezone_set('America/Sao_Paulo');
/*
$banco = new Banco("localhost", "gaasa", "root", "root");
$banco->query("SELECT * FROM conexoes");
echo "Linhas: ".$banco->numRows()."<br>";

$banco->insert("conexoes", array(
    "ip" => "10.10.1.3",
    "data" => date('Y-m-d H:i:s')
));

$banco->update("conexoes", array(
    "ip" => "192.168.1.2"
), array(
    "id" => "64",
));

$banco->delete("conexoes", array(
    "ip" => "::1"
));
$banco->query("SELECT * FROM conexoes");
foreach ($banco->result() as $resultado){
    echo "<hr>ID: ".$resultado['id']."<br>";
    echo "IP: ".$resultado['ip']."<br>";
    echo "Data: ".$resultado['data']."<br><br>";
}
*/
$usuario = new Usuarios();
print_r($usuario->selecionar("4"));
$usuario->excluir(4);
print_r($usuario->selecionar("4"));