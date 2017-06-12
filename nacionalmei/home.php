<?php
session_start();
require "config.php";
require 'usuario.php';
require 'menu.php';
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){

} else{
    $_SESSION['retorno'] = 10;
    header("Location:login");
}
$usuario = new Usuario(addslashes($_SESSION['id']));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Area Restrita</title>
    <link rel="shortcut icon" href="assets/imgs/logo.jpg" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato%3A400%2C700%7CArimo%3A700&subset=latin&ver=1480945793
" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css?2" type="text/css" />
</head>
<body>
<?php inserirMenu($usuario, 0)?>
<div class="main">
    <a href="http://alunos.phpdozeroaoprofissional.com.br/sorteio/" target="_blank">
        <div class="alert alert-info">SORTEIO ACONTECENDO ATÉ O DIA <strong>11/06 (DOMINGO)</strong>! PARTICIPE CLICANDO AQUI.</div>
    </a>
    <div class="alert alert-warning">Plataforma em atualização. Podem haver instabilidades.</div>
    <div class="row">
        <div class="col-sm-4">
            <div class="box">
                <div class="box-title">
                    Progresso Geral
                </div>
                <div class="box-body">
                    <div id="geralprogress"></div>
                    <div class="geralinfo">
                        <strong>327</strong> aulas assistidas<br/>
                        <strong>327</strong> pontos acumulados				</div>
                </div>
            </div>

            <div class="box homedis">
                <div class="box-title">
                    Últimas discussões no curso
                </div>
                <div class="box-body">
                    <a href="http://alunos.phpdozeroaoprofissional.com.br/discussions/open/58">
                        <div class="discussion_item">
                            <div class="dis_info">
                                <div class="dis_title">
                                    Não acho as aulas de responsividade 							</div>
                                <div class="dis_author"><img src="http://alunos.phpdozeroaoprofissional.com.br/media/avatar/6e09f4cfe95d0ab414f730cd1f1a972e.jpg" border="0" width="15" height="15" /> Lucas R.<br/>
                                    <img src="assets/imgs/time.png" border="0" width="13" height="13" /> há 58 minutos atrás</div>
                            </div>
                        </div>
                    </a>
                    <a href="http://alunos.phpdozeroaoprofissional.com.br/discussions/open/55">
                        <div class="discussion_item">
                            <div class="dis_info">
                                <div class="dis_title">
                                    Acesso Proibido! Error 403							</div>
                                <div class="dis_author"><img src="http://alunos.phpdozeroaoprofissional.com.br/media/avatar/default.jpg" border="0" width="15" height="15" /> Magnólia M.<br/>
                                    <img src="assets/imgs/time.png" border="0" width="13" height="13" /> há 2 horas atrás</div>
                            </div>
                        </div>
                    </a>
                    <a href="http://alunos.phpdozeroaoprofissional.com.br/discussions/open/57">
                        <div class="discussion_item">
                            <div class="dis_info">
                                <div class="dis_title">
                                    URL							</div>
                                <div class="dis_author"><img src="http://alunos.phpdozeroaoprofissional.com.br/media/avatar/default.jpg" border="0" width="15" height="15" /> William W.<br/>
                                    <img src="assets/imgs/time.png" border="0" width="13" height="13" /> há 2 horas atrás</div>
                            </div>
                        </div>
                    </a>
                    <a href="http://alunos.phpdozeroaoprofissional.com.br/discussions/open/56">
                        <div class="discussion_item">
                            <div class="dis_info">
                                <div class="dis_title">
                                    Encoding 							</div>
                                <div class="dis_author"><img src="http://alunos.phpdozeroaoprofissional.com.br/media/avatar/default.jpg" border="0" width="15" height="15" /> sanviê P.<br/>
                                    <img src="assets/imgs/time.png" border="0" width="13" height="13" /> há 2 horas atrás</div>
                            </div>
                        </div>
                    </a>
                    <a href="http://alunos.phpdozeroaoprofissional.com.br/discussions/open/53">
                        <div class="discussion_item">
                            <div class="dis_info">
                                <div class="dis_title">
                                    <div>resolvido</div>
                                    considerando que o js é uma linguagem existe algum dicionario pelo criador ?							</div>
                                <div class="dis_author"><img src="http://alunos.phpdozeroaoprofissional.com.br/media/avatar/5a9bec7bace5454b5e31b39c8e8f1666.jpg" border="0" width="15" height="15" /> Wictor M.<br/>
                                    <img src="assets/imgs/time.png" border="0" width="13" height="13" /> há 3 horas atrás</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box">
                <div class="box-title">
                    Últimas aulas assistidas
                </div>
                <div class="box-body">
                    <div class="log_item">
                        <a href="http://alunos.phpdozeroaoprofissional.com.br/lesson/open/247">
                            <img src="assets/imgs/checked-symbol.png" border="0" width="15" height="15" /> Criando uma Calculadora OO</a> - há 100+ dias atrás
                    </div>
                    <div class="log_item">
                        <a href="http://alunos.phpdozeroaoprofissional.com.br/lesson/open/2">
                            <img src="assets/imgs/checked-symbol.png" border="0" width="15" height="15" /> Como aprender</a> - há 100+ dias atrás
                    </div>
                    <div class="log_item">
                        <a href="http://alunos.phpdozeroaoprofissional.com.br/lesson/open/3">
                            <img src="assets/imgs/checked-symbol.png" border="0" width="15" height="15" /> Como funciona um site</a> - há 100+ dias atrás
                    </div>
                    <div class="log_item">
                        <a href="http://alunos.phpdozeroaoprofissional.com.br/lesson/open/4">
                            <img src="assets/imgs/checked-symbol.png" border="0" width="15" height="15" /> Como um servidor funciona</a> - há 100+ dias atrás
                    </div>
                    <div class="log_item">
                        <a href="http://alunos.phpdozeroaoprofissional.com.br/lesson/open/5">
                            <img src="assets/imgs/checked-symbol.png" border="0" width="15" height="15" /> Como o PHP funciona</a> - há 100+ dias atrás
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-title">
                    Avisos oficiais
                </div>
                <div class="box-body">
                    <div class="log_item">
                        <small>05/06/2017</small><br/><a class="ajax-lightbox" href="http://alunos.phpdozeroaoprofissional.com.br/ajax/opennews/1">Nova versão (2.0) - Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box">
                <div class="box-title">
                    Aulas assistidas nos últimos 7 dias
                </div>
                <div class="box-body">
                    <canvas id="rel1"></canvas>
                </div>
            </div>

            <div class="box">
                <div class="box-title">
                    Suas conquistas
                </div>
                <div class="box-body">
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                    <img src="assets/imgs/badge.png" border="0" width="30" height="30" />
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var days_list = ["05\/06","06\/06","07\/06","08\/06","09\/06","10\/06","11\/06"];
        var days_watched = [0,0,0,0,0,0,0];
    </script>
    <script type="text/javascript" src="assets/js/progressbar.min.js"></script>
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>
    <script type="text/javascript" src="assets/js/home.js"></script>
    <script type="text/javascript">
        bar.animate(0.530844155844);
    </script>
</div>
<div class="notification_area">
    <div class="notification">
        <img src="http://alunos.phpdozeroaoprofissional.com.br/assets/images/thumbs-up-hand-symbol.png" border="0" width="35" height="35" />
        <strong>Parabéns!</strong><br/>
        <span>Você ganhou +1 ponto!</span>
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/script.js?v2"></script>
</body>
</html>
