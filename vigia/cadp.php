<?php
session_start();
require 'config.php';
$tabela = $_SESSION['tabela'];
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){
    if($_SESSION['permissao'] == 1){
        if(isset($_POST['materia']) && empty($_POST['materia']) == false){
            $materia = addslashes($_POST['materia']);
            if(isset($_POST['professor']) && empty($_POST['professor']) == false){
                $professor = addslashes($_POST['professor']);
                if(isset($_POST['data']) && empty($_POST['data']) == false){
                    $dia = substr(addslashes($_POST['data']), 0, 2);
                    $mes = substr(addslashes($_POST['data']), -2);
                    if(isset($_POST['tipo']) && empty($_POST['tipo']) == false){
                        $tipo = addslashes($_POST['tipo']);
                        if(isset($_POST['bimestre']) && empty($_POST['bimestre']) == false){
                            $data = date('Y-m-d H:i:s');
                            $bimestre = addslashes($_POST['bimestre']);
                            $anotacoes = addslashes(htmlspecialchars($_POST['anotacoes']));
                            if(isset($_POST['nota']) && empty($_POST['nota']) == false){
                                $nota = addslashes($_POST['nota']);
                                $nota = str_replace(",",".", $nota);
                            } else{
                                $nota = "";
                            }
                            if ($nota == "" || $nota == null){
                                $entregue = 0;
                                $sql2 = $pdo->query("INSERT INTO `$tabela` SET dia = '$dia',mes = '$mes',materia = '$materia',professor = '$professor',entregue = '$entregue', nota = NULL, anotacoes = '$anotacoes',tipo = '$tipo', bimestre = '$bimestre', dt_cadastro = '$data'");
                                if($_POST['retorno'] == 1){
                                    $_SESSION['retorno'] = 1;
                                } else if($_POST['retorno'] == 2) {
                                    $_SESSION['retorno'] = 2;
                                }
                                echo "1";
                            } else{
                                $entregue = 1;
                                $sql2 = $pdo->query("INSERT INTO `$tabela` SET dia = '$dia',mes = '$mes',materia = '$materia',professor = '$professor',entregue = '$entregue', nota = '$nota', anotacoes = '$anotacoes',tipo = '$tipo', bimestre = '$bimestre', dt_cadastro = '$data'");
                                echo "1";
                                if($_POST['retorno'] == 1){
                                    $_SESSION['retorno'] = 1;
                                } else if($_POST['retorno'] == 2) {
                                    $_SESSION['retorno'] = 2;
                                }
                            }
                        } else{
                            echo "Bimestre vazio";
                        }
                    }else{
                        echo "Tipo vazio";
                    }
                } else{
                    echo "Dia vazio";
                }
            } else{
                echo "Professor vazio";
            }
        } else{
            echo "Matéria vazia";
        }
    }else{
        $_SESSION['retorno'] = 6;
        header("Location:index.php");
    }
}else{
    $_SESSION['retorno'] = 8;
    header("Location:index.php");
}
?>