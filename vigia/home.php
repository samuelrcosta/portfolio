<?php
session_start();
if($_SESSION['retorno'] == 1){
    echo "<div id='retornosessao' class=\"alert alert-success alert-dismissable\">
            <strong>Sucesso!</strong> Prova cadastrada!
          </div>";
}
if($_SESSION['retorno'] == 3){
    echo "<div id='retornosessao' class=\"alert alert-success alert-dismissable\">
            <strong>Sucesso!</strong> Prova editada!
          </div>";
}
if($_SESSION['retorno'] == 4){
    echo "<div id='retornosessao' class=\"alert alert-success alert-dismissable\">
            <strong>Sucesso!</strong> Prova excluida!
          </div>";
}
if($_SESSION['retorno'] == 5){
    echo "<div id='retornosessao' class=\"alert alert-success alert-dismissable\">
            <strong>Cadastro feito com sucesso!</strong>
          </div>";
}
if($_SESSION['retorno'] == 6){
    echo "<div id='retornosessao' class=\"alert alert-danger alert-dismissable\">
            <strong>Você precisa estar logado para realizar essa ação!</strong>
          </div>";
}
if($_SESSION['retorno'] == 7){
    echo "<div id='retornosessao' class=\"alert alert-danger alert-dismissable\">
            <strong>Prova inválida!</strong>
          </div>";
}
if($_SESSION['retorno'] == 8){
    echo "<div id='retornosessao' class=\"alert alert-danger alert-dismissable\">
            <strong>Você não tem permissão para realizar essa ação!</strong>
          </div>";
}
$_SESSION['retorno'] = 0;
$tabela = $_SESSION['tabela'];
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){
    if($_SESSION['permissao'] == 0){
    }
} else{
    $_SESSION['retorno'] = 10;
    header("Location:login");
}
if($_SESSION['retorno'] == 1){
    $_SESSION['retorno'] = 0;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Home - School Guard</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style_home.css"/>
    
</head>
<body>
<div class="container-fluid">
    <div class="cabecalho">
        <div class="cabecalho-titulo">
            <div class="img-titulo"><a href="home"><img width="100" height="100" src="assets/imgs/seg_gg.png"/></a></div>
            <a href="home" style="color: #333"><h1>School Guard</h1></a>
            <div class="botoes">
                <div>
                    <h3 id = "painel-data">Dia: </h3>
                </div>
                <div style="float: right;">
                    <button class="btn btn-info btnboletim" style="display: none" id="cadastrarprova" onclick="location.href='cadprova.php'">Cadastrar Prova</button>
                    <button class="btn btn-info btnboletim" onclick="location.href='boletim'">Boletim</button>
                    <button class="btn btn-info btnboletim" onclick="location.href='logout.php'">Sair</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="linha-r"><hr align="right"></div>
            <div class="linha-l"><hr align="right"></div>
            <h3>1º Bimestre</h3>
            <ul class="list-group">
                    <?php
                    require 'config.php';
                    $bimestre = 1;
                    $max = "SELECT Max(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                    $min = "SELECT Min(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                    $max = $pdo->query($max);
                    $max = $max->fetch()[0];
                    $min = $pdo->query($min);
                    $min = $min->fetch()[0];
                    for ($i = $min; $i <= $max; $i++){
                        $sql = "SELECT * FROM ".$tabela." WHERE bimestre = '$bimestre' AND mes = '$i' ORDER BY dia";
                        $sql = $pdo->query($sql);
                        if($sql->rowCount() > 0){
                            foreach ($sql->fetchALL() as $prova){
                                echo "<li class=\"item-lista list-group-item\">";
                                echo "<button class=\"btn btn-li btn-normal\">";
                                echo "    <div class=\"data-prova\">
                                            <span class=\"badge\">".$prova['dia']."/".$prova['mes']."</span>
                                          </div>
                                        ".$prova['materia'];
                                echo "    <div class=\"msg-atraso\">
                                            <span class=\"dias-passados badge\" data-entregue=".$prova['entregue']." data-nota='".$prova['nota']."' data-anotacoes='".$prova['anotacoes']."' data-dia=".$prova['dia']." data-mes=".$prova['mes']." style=\"display: none\" id=\"p".$prova['n']."\"></span>
                                          </div>
                                      </button>";
                                echo "<div class=\"prova-detalhes\" style=\"display: none\">
                                            <ul class=\"list-group lista-detalhes\">
                                                <li class=\"list-group-item\">Professor: ".$prova['professor']."</li>
                                                <li class=\"list-group-item\">Tipo: N".$prova['tipo']."</li>
                                                <li class=\"list-group-item nota\">Nota: ".$prova['nota']."</li>
                                                <li class=\"list-group-item entry-no\">Não entregue ainda</li>
                                                <li class=\"list-group-item anotacoes\">Anotações: ".$prova['anotacoes']."</li>
                                                <li class=\"list-group-item editar\" style='display:none'><a href='editar.php?n=".base64_encode($prova['n'])."'><button class=\"btn btn-info btn-editar\" data-id=".$prova['n'].">Editar</button></a></li>
                                            </ul>
                                      </div>";
                            }
                        }
                    }
                    ?>
                </li>
            </ul>
        </div>
        <div class="col-lg-3">
            <div class="linha-r"><hr align="right"></div>
            <h3>2º Bimestre</h3>
            <ul class="list-group">
                <?php
                require 'config.php';
                $bimestre = 2;
                $max = "SELECT Max(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                $min = "SELECT Min(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                $max = $pdo->query($max);
                $max = $max->fetch()[0];
                $min = $pdo->query($min);
                $min = $min->fetch()[0];
                for ($i = $min; $i <= $max; $i++){
                    $sql = "SELECT * FROM ".$tabela." WHERE bimestre = '$bimestre' AND mes = '$i' ORDER BY dia";
                    $sql = $pdo->query($sql);
                    if($sql->rowCount() > 0){
                        foreach ($sql->fetchALL() as $prova){
                            echo "<li class=\"item-lista list-group-item\">";
                            echo "<button class=\"btn btn-li btn-normal\">";
                            echo "    <div class=\"data-prova\">
                                            <span class=\"badge\">".$prova['dia']."/".$prova['mes']."</span>
                                          </div>
                                        ".$prova['materia'];
                            echo "    <div class=\"msg-atraso\">
                                            <span class=\"dias-passados badge\" data-entregue=".$prova['entregue']." data-nota='".$prova['nota']."' data-anotacoes='".$prova['anotacoes']."' data-dia=".$prova['dia']." data-mes=".$prova['mes']." style=\"display: none\" id=\"p".$prova['n']."\"></span>
                                          </div>
                                      </button>";
                            echo "<div class=\"prova-detalhes\" style=\"display: none\">
                                            <ul class=\"list-group lista-detalhes\">
                                                <li class=\"list-group-item\">Professor: ".$prova['professor']."</li>
                                                <li class=\"list-group-item\">Tipo: N".$prova['tipo']."</li>
                                                <li class=\"list-group-item nota\">Nota: ".$prova['nota']."</li>
                                                <li class=\"list-group-item entry-no\">Não entregue ainda</li>
                                                <li class=\"list-group-item anotacoes\">Anotações: ".$prova['anotacoes']."</li>
                                                <li class=\"list-group-item editar\" style='display:none'><a href='editar.php?n=".base64_encode($prova['n'])."'><button class=\"btn btn-info btn-editar\" data-id=".$prova['n'].">Editar</button></a></li>
                                            </ul>
                                      </div>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-lg-3">
            <div class="linha-r"><hr align="right"></div>
            <h3>3º Bimestre</h3>
            <ul class="list-group">
                <?php
                require 'config.php';
                $bimestre = 3;
                $max = "SELECT Max(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                $min = "SELECT Min(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                $max = $pdo->query($max);
                $max = $max->fetch()[0];
                $min = $pdo->query($min);
                $min = $min->fetch()[0];
                for ($i = $min; $i <= $max; $i++){
                    $sql = "SELECT * FROM ".$tabela." WHERE bimestre = '$bimestre' AND mes = '$i' ORDER BY dia";
                    $sql = $pdo->query($sql);
                    if($sql->rowCount() > 0){
                        foreach ($sql->fetchALL() as $prova){
                            echo "<li class=\"item-lista list-group-item\">";
                            echo "<button class=\"btn btn-li btn-normal\">";
                            echo "    <div class=\"data-prova\">
                                            <span class=\"badge\">".$prova['dia']."/".$prova['mes']."</span>
                                          </div>
                                        ".$prova['materia'];
                            echo "    <div class=\"msg-atraso\">
                                            <span class=\"dias-passados badge\" data-entregue=".$prova['entregue']." data-nota='".$prova['nota']."' data-anotacoes='".$prova['anotacoes']."' data-dia=".$prova['dia']." data-mes=".$prova['mes']." style=\"display: none\" id=\"p".$prova['n']."\"></span>
                                          </div>
                                      </button>";
                            echo "<div class=\"prova-detalhes\" style=\"display: none\">
                                            <ul class=\"list-group lista-detalhes\">
                                                <li class=\"list-group-item\">Professor: ".$prova['professor']."</li>
                                                <li class=\"list-group-item\">Tipo: N".$prova['tipo']."</li>
                                                <li class=\"list-group-item nota\">Nota: ".$prova['nota']."</li>
                                                <li class=\"list-group-item entry-no\">Não entregue ainda</li>
                                                <li class=\"list-group-item anotacoes\">Anotações: ".$prova['anotacoes']."</li>
                                                <li class=\"list-group-item editar\" style='display:none'><a href='editar.php?n=".base64_encode($prova['n'])."'><button class=\"btn btn-info btn-editar\" data-id=".$prova['n'].">Editar</button></a></li>
                                            </ul>
                                      </div>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-lg-3">
            <div class="linha-r"><hr align="right"></div>
            <div class="linha-l"><hr align="right"></div>
            <h3>4º Bimestre</h3>
            <ul class="list-group">
                <?php
                require 'config.php';
                $bimestre = 4;
                $max = "SELECT Max(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                $min = "SELECT Min(mes) FROM `$tabela` WHERE bimestre = '$bimestre'";
                $max = $pdo->query($max);
                $max = $max->fetch()[0];
                $min = $pdo->query($min);
                $min = $min->fetch()[0];
                for ($i = $min; $i <= $max; $i++){
                    $sql = "SELECT * FROM ".$tabela." WHERE bimestre = '$bimestre' AND mes = '$i' ORDER BY dia";
                    $sql = $pdo->query($sql);
                    if($sql->rowCount() > 0){
                        foreach ($sql->fetchALL() as $prova){
                            echo "<li class=\"item-lista list-group-item\">";
                            echo "<button class=\"btn btn-li btn-normal\">";
                            echo "    <div class=\"data-prova\">
                                            <span class=\"badge\">".$prova['dia']."/".$prova['mes']."</span>
                                          </div>
                                        ".$prova['materia'];
                            echo "    <div class=\"msg-atraso\">
                                            <span class=\"dias-passados badge\" data-entregue=".$prova['entregue']." data-nota='".$prova['nota']."' data-anotacoes='".$prova['anotacoes']."' data-dia=".$prova['dia']." data-mes=".$prova['mes']." style=\"display: none\" id=\"p".$prova['n']."\"></span>
                                          </div>
                                      </button>";
                            echo "<div class=\"prova-detalhes\" style=\"display: none\">
                                            <ul class=\"list-group lista-detalhes\">
                                                <li class=\"list-group-item\">Professor: ".$prova['professor']."</li>
                                                <li class=\"list-group-item\">Tipo: N".$prova['tipo']."</li>
                                                <li class=\"list-group-item nota\">Nota: ".$prova['nota']."</li>
                                                <li class=\"list-group-item entry-no\">Não entregue ainda</li>
                                                <li class=\"list-group-item anotacoes\">Anotações: ".$prova['anotacoes']."</li>
                                                <li class=\"list-group-item editar\" style='display:none'><a href='editar.php?n=".base64_encode($prova['n'])."'><button class=\"btn btn-info btn-editar\" data-id=".$prova['n'].">Editar</button></a></li>
                                            </ul>
                                      </div>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>