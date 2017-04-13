<?php
session_start();
require 'config.php';
$tabela = $_SESSION['tabela'];
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){
}else{
    $_SESSION['retorno'] = 6;
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Boletim</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
<div class="container-fluid">
    <div class="cabecalho">
        <div class="cabecalho-titulo">
            <div class="img-titulo"><a href="index.php"><img width="100" height="100" src="assets/imgs/seg_gg.png"/></a></div>
            <a href="index.php" style="color: #333"><h1>School Guard</h1></a>
            <div class="botoes">
                <div>
                    <h3 id = "painel-data">Dia: </h3>
                </div>
                <div style="float: right;">
                    <a href="index.php"><button class="btn btn-info btnlogin">Início</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="legenda">
        <h5>Legenda:</h5>
        <div style="background-color: #FFFF00;padding: 6px;">Nota da prova abaixo da Média</div>
        <div style="background-color: #B0C4DE;padding: 6px;">Nota necessária para atingir a média</div>
        <div style="background-color: #FF6347;padding: 6px;">Nota final abaixo da média</div>
    </div>
    <div class="seletor" data-bimestre="primeiro">
        <h2 class="h2" style="text-align: center">Primeiro Bimestre</h2>
    </div>
    <div class="primeiro table-responsive" style="display: none">
        <?php
        $m = "SELECT materia FROM `$tabela`";
        $m = $pdo->query($m);
        $materias = array();
        $medias_1 = array();
        $medias_2 = array();
        $medias_3 = array();
        $medias_4 = array();
        foreach ($m->fetchALL() as $item){
            array_push($materias,$item['materia']);
        }
        $materias = array_unique($materias);
        $materias = array_values($materias);
        for ($i = 0; $i < sizeof($materias); $i++) {
            $n = "SELECT nota FROM `$tabela` WHERE materia = '$materias[$i]' and bimestre = 1";
            $n = $pdo->query($n);
            $vernotas = array();
            $notas = array();
            $soma = 0;
            $cont = sizeof($notas);
            $contv = 0;
            foreach ($n->fetchAll() as $item){
                array_push($notas, $item['nota']);
                array_push($vernotas, 1);
            }
            $cont = sizeof($notas);
            echo "<table class=\"table table-bordered table-responsive\" >
                        <thead>
                            <tr>
                                <th class='th'></th>      
                    ";
            $verifica = 0;
            for ($j = 1; $j < sizeof($notas) + 1; $j++){
                if ($notas[$j - 1] == ""){
                    $contv = $contv + 1;
                    $vernotas[$j - 1] = 0;
                }
                echo "<th class=\"menor th\">P".$j."</th>";
            }
            $valortot = 0;
            for($j = 0; $j < sizeof($notas); $j++){
                $valortot = $valortot + $notas[$j];
            }
            if($contv != 0){
                $falta = ((sizeof($notas)*6) - $valortot)/$contv;
                for($w = 0; $w < sizeof($notas); $w++){
                    if($notas[$w] == ""){
                        $notas[$w] = $falta;
                    }
                }
            }else{
                $falta = "Feitas";
            }

            echo "<th class=\"menor th\">Final</th>";
            echo "    </tr>
                  </thead>
                  <tbody>
                    <td class=\"materia\">".$materias[$i]."</td>";
            for ($j = 0; $j < sizeof($notas); $j++){
                if ($notas[$j] == null || $notas[$j] == ""){
                    $item = "";
                    $verifica = 1;
                }
                else{
                    if($vernotas[$j] == "0"){
                        $item = number_format($notas[$j],1,",","");
                        $verifica = 1;
                        echo "<td class=\"menor nota previsao\">".$item."</td>";
                    }else{
                        $soma = $soma + $notas[$j];
                        settype($notas[$j], "double");
                        $item = number_format($notas[$j],1,",","");
                        echo "<td class=\"menor nota\">".$item."</td>";
                    }
                }
            }
            if ($cont > 0){
                $media = number_format($soma/$cont,1,",","");
            }else{
                $media = "";
            }
            array_push($medias_1, $media);
            if($verifica == 1){
                echo "<td data-verifica='1' class='final'>".$media."</td>";
            } else{
                echo "<td data-verifica='0' class='final'>".$media."</td>";
            }
            echo "</tbody>
                </table>";
        }
        ?>
    </div>
    <div class="seletor" data-bimestre="segundo">
        <h2 class="h2" style="text-align: center">Segundo Bimestre</h2>
    </div>
    <div class="segundo table-responsive" style="display: none">
        <?php
        $m = "SELECT materia FROM `$tabela`";
        $m = $pdo->query($m);
        $materias = array();
        foreach ($m->fetchALL() as $item){
            array_push($materias,$item['materia']);
        }
        $materias = array_unique($materias);
        $materias = array_values($materias);
        for ($i = 0; $i < sizeof($materias); $i++) {
            $n = "SELECT nota FROM `$tabela` WHERE materia = '$materias[$i]' and bimestre = 2";
            $n = $pdo->query($n);
            $vernotas = array();
            $notas = array();
            $soma = 0;
            $cont = sizeof($notas);
            $contv = 0;
            foreach ($n->fetchAll() as $item){
                array_push($notas, $item['nota']);
                array_push($vernotas, 1);
            }
            $cont = sizeof($notas);
            echo "<table class=\"table table-bordered table-responsive\" >
                        <thead>
                            <tr>
                                <th class='th'></th>      
                    ";
            $verifica = 0;
            for ($j = 1; $j < sizeof($notas) + 1; $j++){
                if ($notas[$j - 1] == ""){
                    $contv = $contv + 1;
                    $vernotas[$j - 1] = 0;
                }
                echo "<th class=\"menor th\">P".$j."</th>";
            }
            $valortot = 0;
            for($j = 0; $j < sizeof($notas); $j++){
                $valortot = $valortot + $notas[$j];
            }
            if($contv != 0){
                $falta = ((sizeof($notas)*6) - $valortot)/$contv;
                for($w = 0; $w < sizeof($notas); $w++){
                    if($notas[$w] == ""){
                        $notas[$w] = $falta;
                    }
                }
            }else{
                $falta = "Feitas";
            }

            echo "<th class=\"menor th\">Final</th>";
            echo "    </tr>
                  </thead>
                  <tbody>
                    <td class=\"materia\">".$materias[$i]."</td>";
            for ($j = 0; $j < sizeof($notas); $j++){
                if ($notas[$j] == null || $notas[$j] == ""){
                    $item = "";
                    $verifica = 1;
                }
                else{
                    if($vernotas[$j] == "0"){
                        $item = number_format($notas[$j],1,",","");
                        $verifica = 1;
                        echo "<td class=\"menor nota previsao\">".$item."</td>";
                    }else{
                        $soma = $soma + $notas[$j];
                        settype($notas[$j], "double");
                        $item = number_format($notas[$j],1,",","");
                        echo "<td class=\"menor nota\">".$item."</td>";
                    }
                }
            }
            if ($cont > 0){
                $media = number_format($soma/$cont,1,",","");
            }else{
                $media = "";
            }
            array_push($medias_2, $media);
            if($verifica == 1){
                echo "<td data-verifica='1' class='final'>".$media."</td>";
            } else{
                echo "<td data-verifica='0' class='final'>".$media."</td>";
            }
            echo "</tbody>
                </table>";
        }
        ?>
    </div>
    <div class="seletor" data-bimestre="terceiro">
        <h2 class="h2" style="text-align: center">Terceiro Bimestre</h2>
    </div>
    <div class="terceiro table-responsive" style="display: none">
        <?php
        $m = "SELECT materia FROM `$tabela`";
        $m = $pdo->query($m);
        $materias = array();
        foreach ($m->fetchALL() as $item){
            array_push($materias,$item['materia']);
        }
        $materias = array_unique($materias);
        $materias = array_values($materias);
        for ($i = 0; $i < sizeof($materias); $i++) {
            $n = "SELECT nota FROM `$tabela` WHERE materia = '$materias[$i]' and bimestre = 3";
            $n = $pdo->query($n);
            $vernotas = array();
            $notas = array();
            $soma = 0;
            $cont = sizeof($notas);
            $contv = 0;
            foreach ($n->fetchAll() as $item){
                array_push($notas, $item['nota']);
                array_push($vernotas, 1);
            }
            $cont = sizeof($notas);
            echo "<table class=\"table table-bordered table-responsive\" >
                        <thead>
                            <tr>
                                <th class='th'></th>      
                    ";
            $verifica = 0;
            for ($j = 1; $j < sizeof($notas) + 1; $j++){
                if ($notas[$j - 1] == ""){
                    $contv = $contv + 1;
                    $vernotas[$j - 1] = 0;
                }
                echo "<th class=\"menor th\">P".$j."</th>";
            }
            $valortot = 0;
            for($j = 0; $j < sizeof($notas); $j++){
                $valortot = $valortot + $notas[$j];
            }
            if($contv != 0){
                $falta = ((sizeof($notas)*6) - $valortot)/$contv;
                for($w = 0; $w < sizeof($notas); $w++){
                    if($notas[$w] == ""){
                        $notas[$w] = $falta;
                    }
                }
            }else{
                $falta = "Feitas";
            }

            echo "<th class=\"menor th\">Final</th>";
            echo "    </tr>
                  </thead>
                  <tbody>
                    <td class=\"materia\">".$materias[$i]."</td>";
            for ($j = 0; $j < sizeof($notas); $j++){
                if ($notas[$j] == null || $notas[$j] == ""){
                    $item = "";
                    $verifica = 1;
                }
                else{
                    if($vernotas[$j] == "0"){
                        $item = number_format($notas[$j],1,",","");
                        $verifica = 1;
                        echo "<td class=\"menor nota previsao\">".$item."</td>";
                    }else{
                        $soma = $soma + $notas[$j];
                        settype($notas[$j], "double");
                        $item = number_format($notas[$j],1,",","");
                        echo "<td class=\"menor nota\">".$item."</td>";
                    }
                }
            }
            if ($cont > 0){
                $media = number_format($soma/$cont,1,",","");
            }else{
                $media = "";
            }
            array_push($medias_3, $media);
            if($verifica == 1){
                echo "<td data-verifica='1' class='final'>".$media."</td>";
            } else{
                echo "<td data-verifica='0' class='final'>".$media."</td>";
            }
            echo "</tbody>
                </table>";
        }
        ?>
    </div>
    <div class="seletor" data-bimestre="quarto">
        <h2 class="h2" style="text-align: center">Quarto Bimestre</h2>
    </div>
    <div class="quarto table-responsive" style="display: none">
        <?php
        $m = "SELECT materia FROM `$tabela`";
        $m = $pdo->query($m);
        $materias = array();
        foreach ($m->fetchALL() as $item){
            array_push($materias,$item['materia']);
        }
        $materias = array_unique($materias);
        $materias = array_values($materias);
        for ($i = 0; $i < sizeof($materias); $i++) {
            $n = "SELECT nota FROM `$tabela` WHERE materia = '$materias[$i]' and bimestre = 4";
            $n = $pdo->query($n);
            $vernotas = array();
            $notas = array();
            $soma = 0;
            $cont = sizeof($notas);
            $contv = 0;
            foreach ($n->fetchAll() as $item){
                array_push($notas, $item['nota']);
                array_push($vernotas, 1);
            }
            $cont = sizeof($notas);
            echo "<table class=\"table table-bordered table-responsive\" >
                        <thead>
                            <tr>
                                <th class='th'></th>      
                    ";
            $verifica = 0;
            for ($j = 1; $j < sizeof($notas) + 1; $j++){
                if ($notas[$j - 1] == ""){
                    $contv = $contv + 1;
                    $vernotas[$j - 1] = 0;
                }
                echo "<th class=\"menor th\">P".$j."</th>";
            }
            $valortot = 0;
            for($j = 0; $j < sizeof($notas); $j++){
                $valortot = $valortot + $notas[$j];
            }
            if($contv != 0){
                $falta = ((sizeof($notas)*6) - $valortot)/$contv;
                for($w = 0; $w < sizeof($notas); $w++){
                    if($notas[$w] == ""){
                        $notas[$w] = $falta;
                    }
                }
            }else{
                $falta = "Feitas";
            }

            echo "<th class=\"menor th\">Final</th>";
            echo "    </tr>
                  </thead>
                  <tbody>
                    <td class=\"materia\">".$materias[$i]."</td>";
            for ($j = 0; $j < sizeof($notas); $j++){
                if ($notas[$j] == null || $notas[$j] == ""){
                    $item = "";
                    $verifica = 1;
                }
                else{
                    if($vernotas[$j] == "0"){
                        $item = number_format($notas[$j],1,",","");
                        $verifica = 1;
                        echo "<td class=\"menor nota previsao\">".$item."</td>";
                    }else{
                        $soma = $soma + $notas[$j];
                        settype($notas[$j], "double");
                        $item = number_format($notas[$j],1,",","");
                        echo "<td class=\"menor nota\">".$item."</td>";
                    }
                }
            }
            if ($cont > 0){
                $media = number_format($soma/$cont,1,",","");
            }else{
                $media = "";
            }
            array_push($medias_4, $media);
            if($verifica == 1){
                echo "<td data-verifica='1' class='final'>".$media."</td>";
            } else{
                echo "<td data-verifica='0' class='final'>".$media."</td>";
            }
            echo "</tbody>
                </table>";
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th></th>
                    <th>Primeiro Bimestre</th>
                    <th>Segundo Bimestre</th>
                    <th>Terceiro Bimestre</th>
                    <th>Quarto Bimestre</th>
                    <th>Final</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i = 0; $i < sizeof($medias_1);$i++){
                echo "<tr>";
                echo "<td>".$materias[$i]."</td>";
                echo "<td>".$medias_1[$i]."</td>";
                echo "<td>".$medias_2[$i]."</td>";
                echo "<td>".$medias_3[$i]."</td>";
                echo "<td>".$medias_4[$i]."</td>";
                $final = ($medias_1[$i] + $medias_2[$i] + $medias_3[$i] + $medias_4[$i]) / 4;
                echo "<td>".$final."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/script_boletim.js"></script>
<link rel="stylesheet" href="assets/css/style_boletim.css"/>
</body>
</html>