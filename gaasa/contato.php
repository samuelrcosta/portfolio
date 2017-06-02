<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Gaasa e Alimentos</title>
    <link rel='shortcut icon' href="assets/imgs/logo.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/style-contato.css"/>
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
    <section class="container">
        <div class="contato_box">
            <div class="title">Contato</div>
            <div class="content">
                <div class="form-group">
                        <?php
                        if (!isset($_POST['tipo']) || empty($_POST['tipo'])){
                            echo "<div class=\"tipo\">
                                     <label>Tipo de contato</label>
                                       <select class=\"form-control\" id='tipo' style='width: 150px;'>
                                        <option value=1 >Vendas</option>
                                        <option value=2 >Compras</option>
                                      </select>
                                  </div>";
                        } else{
                            if ($_POST['tipo'] == 1){
                                echo "<div class=\"tipo\" style='display: none'>
                                     <label>Tipo de contato</label>
                                       <select class=\"form-control\" id='tipo' style='width: 150px;'>
                                        <option value=1 selected >Vendas</option>
                                        <option value=2 >Compras</option>
                                      </select>
                                  </div>";
                            } else if($_POST['tipo'] == 2){
                                echo "<div class=\"tipo\" style='display: none'>
                                         <label>Tipo de contato</label>
                                            <select class=\"form-control\" id='tipo' style='width: 150px;'>
                                            <option value=1 >Vendas</option>
                                            <option value=2 selected >Compras</option>
                                          </select>
                                      </div>";
                            }
                        }
                        ?>
                    <label>Nome</label>
                    <input class="form-control" id="nome" type="text" name="nome" alt="Nome" data-ob="1" style="max-width: 300px;"/>
                    <label>Empresa</label>
                    <input class="form-control" id="empresa" type="text" name="empresa" alt="Empresa" data-ob="0" style="max-width: 300px;"/>
                    <label>Telefone</label>
                    <input class="form-control" id="telefone" type="text" name="telefone" alt="Telefone" data-ob="0" style="max-width: 300px;"/>
                    <label>Endereço de e-mail</label>
                    <input class="form-control" id="email" type="text" name="email" alt="Endereço de E-mail" data-ob="1" style="max-width: 300px;"/>
                    <label>Assunto</label>
                    <input class="form-control" id="assunto" type="text" name="assunto" alt="Assunto" data-ob="1"/>
                    <label>Mensagem</label>
                    <textarea class="form-control" rows="5" id="mensagem" name="mensagem" alt="Mensagem" data-ob="1"></textarea>
                </div>
                <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
                    <ul class="list-group">
                        <li class="list-group-item">
                            TESTE
                        </li>
                    </ul>
                </div>
                <button class="btn btn-success botao-enviar" onclick="enviar()">Enviar</button>
                <button class="btn btn-danger botao-cancelar" onclick="location.href='index'">Cancelar</button>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            2017 ® Gaasa e Alimentos LTDA - Todos os direitos reservados
        </div>
    </footer>
</div>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
<script type="text/javascript">
    resize();
    window.onload=function () {
        $('#telefone').mask('(00) 0000-#0000');
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

    function enviar(){
        msg = '<ul class="list-group">';
        var nome = $("#nome").val();
        var empresa = $("#empresa").val();
        var telefone = $("#telefone").val();
        var email = $("#email").val();
        var assunto = $("#assunto").val();
        var mensagem = $("#mensagem").val();
        var tipo = $("#tipo").val();
        if(validaForm() == -1){
            $("#retorno").slideDown().html(msg);
            resize();
        } else if (validaForm() == 0){
            $.post('send.php', {nome: nome, empresa: empresa, telefone: telefone,email: email, assunto: assunto, mensagem:mensagem, tipo:tipo}, function (get_retorno) {
                console.log(nome);
                complete:
                    if(get_retorno == 1){
                        window.location="index";
                    } else{
                        $("#retorno").show("slow").html("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+get_retorno);
                        resize();
                    }
            });
        }
    }

    function validaForm(){
        var input = $('input');
        var textarea = $('textarea');
        var primeiro = 0;
        for(i = 0; i < input.length; i++){
            var text = input[i];
            if(text.getAttribute('data-ob') == "1" && text.value == ''){
                msg = msg+'<li class="list-group-item">O campo ' + text.getAttribute('alt') + ' é obrigatório</li>';
                primeiro = 1;
            }
        }
        for(i = 0; i < textarea.length; i++){
            text = textarea[i];
            if(text.getAttribute('data-ob') == "1" && text.value == ''){
                msg = msg+'<li class="list-group-item">O campo ' + text.getAttribute('alt') + ' é obrigatório</li>';
                primeiro = 1;
            }
        }
        if($("#email").val() != null && $("#email").val() != ''){
            if(validaEmail($("#email").val())){
                msg = msg+'<li class="list-group-item">E-mail inválido</li>';
                primeiro = 1;
            }
        }
        msg = msg+'</ul>';
        if (primeiro == 1){
            return -1;
        } else{
            return 0;
        }
    }

    function validaEmail(text) {
        usuario = text.substring(0, text.indexOf("@"));
        dominio = text.substring(text.indexOf("@")+ 1, text.length);

        if ((usuario.length >=1) &&
            (dominio.length >=3) &&
            (usuario.search("@")==-1) &&
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) &&
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&
            (dominio.indexOf(".") >=1)&&
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
            return 0;
        }
        else{
            return -1;
        }
    }
</script>
</body>
</html>
