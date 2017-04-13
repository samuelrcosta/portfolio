<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Cadastro</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style_index.css"/>
    <link rel="stylesheet" href="assets/css/style-editar.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="cabecalho">
        <div class="cabecalho-titulo" style="margin-bottom: 15px;">
            <a href="index.php"><img width="100" height="100" src="assets/imgs/seg_gg.png"/></a>
            <a href="index.php" style="color: #333"><h1>School Guard</h1></a>
        </div>
    </div>
    <div class="conteudo">
        <div id="form">
            <div class="row form-group">
                <h2 style="margin-bottom: 15px">Cadastrar</h2>
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="table">
                        <tr>
                            <td style="text-align: left;">
                                <label>E-mail</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" type="text" id="email" alt="Email" data-ob="1" name="email"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Nome do usuário</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" type="text" id="usuario" alt="Nome do Usuário" data-ob="1" name="usuario"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Nome do aluno</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" type="text" id="aluno" alt="Nome do Aluno" data-ob="1" name="aluno"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Senha</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" type="password" id="senha" alt="Senha" data-ob="1" name="senha"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Digite novamente a senha</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" type="password" id="confsenha" alt="Confirmar Senha" data-ob="1" name="confsenha"/>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
        <div id='retorno' style='margin-bottom: 5px;margin-top: 5px;display: none' class='alert alert-danger fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>
        <button class="btn btn-success" style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" onclick="enviar()">Cadastrar</button>
        <button class="btn btn-danger" style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" onclick="cancelar()">Cancelar</button>
    </div>
</div>
<script type="text/javascript">
    function validaForm(){
        var input = $('input');
        var primeiro = 0;
        for(i = 0; i < input.length; i++){
            var text = input[i];
            if(text.getAttribute('data-ob') == "1" && text.value == ''){
                msg = msg+'<li class="list-group-item">O campo ' + text.getAttribute('alt') + ' é obrigatório</li>';
                primeiro = 1;
            }
        }
        if($("#senha").val() != "" && $("#confsenha").val() != "" && ($("#senha").val() != $("#confsenha").val())){
            msg = msg+'<li class="list-group-item">As senhas não conferem!</li>';
            primeiro = 1;
        }
        msg = msg+'</ul>'
        if (primeiro == 1){
            return -1;
        } else{
            return 0;
        }
    }

    function cancelar() {
        window.location="login.php";
    }

    function enviar() {
        msg = '<ul class="list-group">';
        var email = $("#email").val();
        var usuario = $("#usuario").val();
        var aluno = $("#aluno").val();
        var senha = $("#senha").val();
        var confsenha = $("#confsenha").val();
        var retorno = 1;
        if(validaForm() == -1){
            $("#retorno").show().html(msg);
        } else if (validaForm() == 0){
            $.post("cadu.php", {email: email, usuario: usuario, aluno:aluno, senha:senha, confsenha:confsenha}, function (get_retorno) {
                complete:
                    if(get_retorno == 1){
                        window.location="index.php";
                    } else{
                        $("#retorno").show("slow").html("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+get_retorno);
                    }
            });
        }
    }
</script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>