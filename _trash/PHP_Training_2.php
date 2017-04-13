<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Training</title>
</head>
<body>
<?php
$dsn = "mysql:dbname=test;host=localhost;charset=utf8";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $sql = "SELECT * FROM provas WHERE materia='Matemática'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        foreach ($sql->fetchALL() as $prova){
            echo "Dia: ".$prova["dia"]." - Mês: ".$prova["mes"]." - Matéria: ".$prova["materia"]." - Professor: ".$prova["professor"]."<br/>";

        }
    }else{
        echo "Não achou";
    }
} catch(PDOException $e){
    echo "Falhou: ".$e->getMessage();
}

?>
</body>
</html>