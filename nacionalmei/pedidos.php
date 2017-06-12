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
if(isset($_GET['filtro'])){
    $tipo = addslashes($_GET['filtro']);
}else{
    $tipo = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pedidos</title>
    <link rel="shortcut icon" href="assets/imgs/logo.jpg" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato%3A400%2C700%7CArimo%3A700&subset=latin&ver=1480945793
" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css?2" type="text/css" />
</head>
<body>
<?php inserirMenu($usuario, 1)?>
<div class="main">
    <h1>Pedidos</h1>
    <div class="discussionarea">
        <div class="row">
            <div class="col-sm-9">
                <?php lerPedidos($tipo)?>
            </div>
            <div class="col-sm-3">
                <h4>Filtrar por</h4>
                <br>
                <div id='0' class="dis_filtro_item"><a href="pedidos">Todos</a></div>
                <div id='1' class="dis_filtro_item "><a href="pedidos?filtro=1">Pagamento aberto</a></div>
                <div id='2' class="dis_filtro_item "><a href="pedidos?filtro=2">Processando pagamento</a></div>
                <div id='3' class="dis_filtro_item "><a href="pedidos?filtro=3">Pagamento feito</a></div>
                <div id='4' class="dis_filtro_item "><a href="pedidos?filtro=4">Recebido</a></div>
                <div id='5' class="dis_filtro_item "><a href="pedidos?filtro=5">Processamento</a></div>
                <div id='6' class="dis_filtro_item "><a href="pedidos?filtro=6">Concluído</a></div>
                <div id='7' class="dis_filtro_item "><a href="pedidos?filtro=7">Criar MEI</a></div>
                <div id='8' class="dis_filtro_item "><a href="pedidos?filtro=8">Atualizar MEI</a></div>
                <div id='9' class="dis_filtro_item "><a href="pedidos?filtro=9">Baixar CNPJ</a></div>
            </div>
        </div>
</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/script.js?v2"></script>
    <script type="text/javascript">
        function queryObj() {
            var result = {}, keyValuePairs = location.search.slice(1).split("&");
            keyValuePairs.forEach(function(keyValuePair) {
                keyValuePair = keyValuePair.split('=');
                result[decodeURIComponent(keyValuePair[0])] = decodeURIComponent(keyValuePair[1]) || '';
            });
            return result;
        }
        var myParam = queryObj();
        if (Object.keys(myParam)[0] != "filtro"){
            $("#0").addClass('dis_filtro_ativo')
        }else{
            $("#"+myParam['filtro']).addClass('dis_filtro_ativo');
        }
    </script>
</body>
</html>