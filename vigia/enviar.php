<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Enviar E-mail</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style_index.css"/>
    <link rel="stylesheet" href="assets/css/style-enviar.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="cabecalho">
        <div class="cabecalho-titulo" style="margin-bottom: 15px;">
            <a href="index.php"><img width="100" height="100" src="assets/imgs/seg_gg.png"/></a>
            <a href="index.php" style="color: #333"><h1>School Guard</h1></a>
            <div class="botoes">
                <div style="float: right;">
                    <a href="login.php"><button class="btn btn-info btnlogin">Voltar</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="conteudo">
        <div id="form">
            <div class="row form-group">
                <h2 style="margin-bottom: 15px">Enviando e-mail</h2>
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="table">
                        <tr>
                            <td style="text-align: left;">
                                <label>Nome</label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" id="nome" type="text" name="nome" alt="Nome" data-ob="1"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <label>Email </label>
                            </td>
                            <td style="text-align: left;">
                                <input class="form-control" id="email" type="email" name="email" alt="Email" data-ob="1"/>
                            </td>
                        </tr>
                        <tr>
                            <td id="anotacoes-label" style="text-align: left;">
                                <label>Mensagem </label>
                            </td>
                            <td id="anotacoes-input" style="text-align: left;">
                                <textarea class="form-control" rows="3" id="mensagem" name="mensagem" alt="Mensagem" data-ob="1"></textarea>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
        <div id='retorno' style='margin-bottom: 5px;margin-top: 5px;display: none' class='alert alert-danger fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>
        <button style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" id="cad1" class="btn btn-success" onclick="enviar()">Enviar</button>
        <button style="margin-top: 5px;margin-bottom: 5px;margin-right: 4px;" class="btn btn-danger" onclick="location.href='login.php'">Cancelar</button>
    </div>
</div>
<script type="text/javascript">
    var msg = '<ul class="list-group">';


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
        msg = msg+'</ul>'
        if (primeiro == 1){
            return -1;
        } else{
            return 0;
        }
    }

    function enviar() {
        msg = '<ul class="list-group">';
        var nome = $("#nome").val();
        var email = $("#email").val();
        var mensagem = $("#mensagem").val();
        if(validaForm() == -1){
            $("#retorno").show().html(msg);
        } else if (validaForm() == 0){
            $.post("enviar2.php", {nome: nome, email: email, mensagem:mensagem}, function (get_retorno) {
                complete:
                    if(get_retorno == 1){
                        window.location="login.php";
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