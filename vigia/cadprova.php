<?php
session_start();
if($_SESSION['retorno'] == 2){
    echo "<div id='retornosessao' class=\"alert alert-success alert-dismissable\">
            <strong>Sucesso!</strong> Prova cadastrada!
          </div>";
    $_SESSION['retorno'] = 0;
}
require 'config.php';
$materia ="";
$tabela = $_SESSION['tabela'];
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){
    if($_SESSION['permissao'] == 1){
    } else{
        $_SESSION['retorno'] = 8;
        header("Location:home.php");
    }
}else{
    $_SESSION['retorno'] = 6;
    header("Location:home.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Cadastrar prova</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style_home.css"/>
    <link rel="stylesheet" href="assets/css/style-editar.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="cabecalho">
        <div class="cabecalho-titulo" style="margin-bottom: 15px;">
            <a href="home.php"><img width="100" height="100" src="assets/imgs/seg_gg.png"/></a>
            <a href="home.php" style="color: #333"><h1>School Guard</h1></a>
            <div class="botoes">
                <div style="float: right;">
                    <a href="home.php"><button class="btn btn-info btnlogin">Voltar</button></a>
                    <a href="boletim.php"><button style="display: none" class="btn btn-info btnboletim">Boletim</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="conteudo">
        <div id="form">
            <div class="row form-group">
                <h2 style="margin-bottom: 15px">Cadastrando Prova</h2>
                <div class="col-sm-6">
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="table">
                        <tr>
                            <td style="text-align: left;">
                                <label>Matéria</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" id="materia" type="text" name="materia" alt="Matéria" data-ob="1"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Professor </label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" id="professor" type="text" name="professor" alt="Professor" data-ob="1"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Data da Prova</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" id="data" type="text" OnKeyUp="mascara_data(this.value)" name="data" maxlength="5" alt="Data" data-ob="1"/>
                            </td>
                        </tr>
                        <tr>
                            <td id="nota-label" style="text-align: left;padding-top: 18px;">
                                <label>Nota</label>
                            </td>
                            <td id="nota-input" style="text-align: left;">
                                <div style="height: 50px">
                                    <input class="form-control" type="text" id="nota" name="nota" alt="Nota" data-ob="0"/>
                                    <input type='checkbox' id='check' name='entregue' checked value='0'>Prova não entregue ainda<br/><br/>
                                    <script type="text/javascript">
                                        if($("#check").attr("checked") == null){
                                            $("#nota").prop('disabled', false);
                                        }else {
                                            $("#nota").prop('disabled', true);
                                        }
                                        $("#check").bind("click", function () {
                                            if($("#nota").attr('disabled') == null){
                                                $("#nota").prop('disabled', true);
                                                $("#nota").attr('value', '');
                                            }else{
                                                $("#nota").prop('disabled', false);
                                            }
                                        })
                                    </script>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="table">
                        <tr>
                            <td style="text-align: left;">
                                <label>Tipo </label>
                            </td>
                            <td style="text-align: left;">
                                <select name="tipo" id="tipo" class="form-control" alt="Tipo" data-ob="1">
                                    <option value=1 >N1</option>
                                    <option value=2 >N2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Bimestre </label>
                            </td>
                            <td style="text-align: left;">
                                <select name="bimestre" id="bimestre" class="form-control" alt="Bimestre" data-ob="1">
                                    <option value=1 >Primeiro</option>";
                                    <option value=2 >Segundo</option>";
                                    <option value=3 >Terceiro</option>";
                                    <option value=4 >Quarto</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="anotacoes-label" style="text-align: left;">
                                <label>Anotações </label>
                            </td>
                            <td id="anotacoes-input" style="text-align: left;">
                                <textarea class="form-control" rows="3" id="anotacoes" name="anotacoes" alt="Anotações" data-ob="0"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id='retorno' style='margin-bottom: 5px;margin-top: 5px;display: none' class='alert alert-danger fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>
        <button style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" id="cad1" class="btn btn-success" onclick="enviar1()">Cadastrar</button>
        <button style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" id="cad2" class="btn btn-success" onclick="enviar2()">Cadastrar e continuar</button>
        <button style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" class="btn btn-danger" onclick="location.href='home'">Cancelar</button>
    </div>
</div>
<script type="text/javascript">
    var msg = '<ul class="list-group">';

    window.onload = function () {
        setTimeout(function () {
            if($("#retornosessao") != null){
                $("#retornosessao").slideUp();
            }
        },3000)
    };

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
        if($("#data").val() != null && $("#data").val() != ''){
            if(verifica_data($("#data").val()) == -1 ){
                msg = msg+'<li class="list-group-item">Data inválida</li>';
                primeiro = 1;
            }
        }
        msg = msg+'</ul>'
        if (primeiro == 1){
            return -1;
        } else{
            return 0;
        }
    }

    function enviar1() {
        msg = '<ul class="list-group">';
        var materia = $("#materia").val();
        var professor = $("#professor").val();
        var data = $("#data").val();
        var nota = $("#nota").val();
        var tipo = $("#tipo").val();
        var bimestre = $("#bimestre").val();
        var anotacoes = $("#anotacoes").val();
        var retorno = 1;
        if(validaForm() == -1){
            $("#retorno").show().html(msg);
        } else if (validaForm() == 0){
            $.post("cadp.php", {materia: materia, professor: professor, data:data, nota:nota, tipo:tipo, bimestre:bimestre, anotacoes:anotacoes, retorno:retorno}, function (get_retorno) {
                complete:
                    if(get_retorno == 1){
                        window.location="home.php";
                    } else{
                        $("#retorno").show("slow").html("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+get_retorno);
                    }
            });
        }
    }

    function enviar2() {
        msg = '<ul class="list-group">';
        var materia = $("#materia").val();
        var professor = $("#professor").val();
        var data = $("#data").val();
        var nota = $("#nota").val();
        var tipo = $("#tipo").val();
        var bimestre = $("#bimestre").val();
        var anotacoes = $("#anotacoes").val();
        var retorno = 2;

        if(validaForm() == -1){
            $("#retorno").show().html(msg);
        } else if (validaForm() == 0){
            $.post("cadp.php", {materia: materia, professor: professor, data:data, nota:nota, tipo:tipo, bimestre:bimestre, anotacoes:anotacoes, retorno:retorno}, function (get_retorno) {
                complete:
                    if(get_retorno == 1){
                        window.location="cadprova.php";
                    } else{
                        $("#retorno").show("slow").html("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+get_retorno);
                    }
            });
        }
    }

</script>
<script type="text/javascript" src="assets/js/data.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>