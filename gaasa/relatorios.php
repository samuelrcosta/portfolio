<?php
session_start();
require "config.php";
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){

} else{
    $_SESSION['retorno'] = 10;
    header("Location:login");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Gaasa e Alimentos</title>
    <link rel='shortcut icon' href="assets/imgs/logo.ico" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/style-relatorios.css">
    <script type="text/javascript" src="assets/js/tether.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div id='site'>
    <nav>
        <div class="container-fluid">
            <div class="topo">
                <div class="topo-img">
                    <img src="assets/imgs/logo.png" height="120px">
                </div>
                <div class="topo-titulo">
                    <h1>Gaasa e Alimentos LTDA</h1>
                    <div>Rodovia GO-070, KM-43<br>75400-000 – Inhumas-GO<br>(62) 3511 - 1862</div>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="menu">
            <ul>
                <li onclick="location.href='index'">
                    Home
                </li>
                <li onclick="location.href='logout.php'" id="sair">
                    Sair
                </li>
            </ul>
        </div>
        <div class="relatorios">
                    <div class="relatorios_box">
                        <div class="title" id="relatorio-1">Relatório de acesso por IP</div>
                        <div class="title" id="relatorio-2">Relatório Completo</div>
                        <div class="content">
                            <div class="area-relatorio">

                            </div>
                        </div>
                    </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            2017 ® Gaasa e Alimentos LTDA - Todos os direitos reservados
        </div>
    </footer>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $.post('relatorio1.php', function (get_retorno) {
            $("#relatorio-1").css("background-color", "green");
            complete:
                $(".content").html(get_retorno);
            resize();
        });
        window.onload=function () {
            resize();
            setTimeout(function () {
                if($("#retornosessao") != null){
                    $("#retornosessao").slideUp();
                }
            },3000)
        };

        window.onresize=function() {
            resize();
        };

        function resize() {
            $('.topo-titulo').css('width', ((parseFloat($('.topo').css('width'))) - parseFloat($('.topo-img').css('width')) - 15));
            $('.topo-titulo').find('div').css('width', parseFloat($('.topo-titulo').find('h1').css('width')));
            if($('html').height() < $(window).height()){
                $('.footer').css('position', 'fixed');
                $('#site').css('height', (parseFloat($(window).height()) - parseFloat($('.footer').css('height'))));
            }
            if($(document).height() > $(window).height()){
                $('.footer').css('position', 'static');
                $('#site').css('height', 'auto');
            }
        }


        $(".contatos_box").find('.img').bind("mouseover", function () {
            $(this).attr('src', 'assets/imgs/envelope-green.png');
        });

        $(".contatos_box").find('.img').bind("mouseout", function () {
            $(this).attr('src', 'assets/imgs/envelope-white.png');
        });

        $(".contatos_box").find('.img').bind('click', function () {
            var tipo = $(this).attr('data-tipo');
            $.redirect('contato', {tipo: tipo});
        });

        $("#relatorio-2").bind("click", function () {
            $(".title").css("background-color", "#04883D");
            $(this).css("background-color", "green");
            $.post('relatorio2.php', function (get_retorno) {
                complete:
                    $(".content").html(get_retorno);
                    resize();
            });
        });
        $("#relatorio-1").bind("click", function () {
            $(".title").css("background-color", "#04883D");
            $(this).css("background-color", "green");
            $.post('relatorio1.php', function (get_retorno) {
                complete:
                    $(".content").html(get_retorno);
                resize();
            });
        });

    </script>
</body>
</html>