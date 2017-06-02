<?php
session_start();
require 'config.php';
$materia ="";
$tabela = $_SESSION['tabela'];
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){
    if($_SESSION['permissao'] == 1){
        if(isset($_GET['n']) && empty($_GET['n']) == false){
            $n = base64_decode(addslashes($_GET['n']));
            $sql = $pdo->query("SELECT * FROM `$tabela` WHERE n = '$n'");
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $materia = $sql['materia'];
                $professor = $sql['professor'];
                $dia = $sql['dia'];
                $mes = $sql['mes'];
                $nota = $sql['nota'];
                $anotacoes = $sql['anotacoes'];
                $tipo = $sql['tipo'];
                $bimestre = $sql['bimestre'];
            } else{
                $_SESSION['retorno'] = 7;
                header("Location:home");
            }
        } else{
            $_SESSION['retorno'] = 7;
            header("Location:home");
        }
    } else{
        $_SESSION['retorno'] = 8;
        header("Location:home");
    }
}else{
    $_SESSION['retorno'] = 6;
    header("Location:home");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Editar prova</title>
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
                <a href="home"><img width="100" height="100" src="assets/imgs/seg_gg.png"/></a>
                <a href="home" style="color: #333"><h1>School Guard</h1></a>
                <div class="botoes">
                    <div style="float: right;">
                        <a href="home"><button class="btn btn-info btnlogin">Voltar</button></a>
                        <a href="boletim"><button style="display: none" class="btn btn-info btnboletim">Boletim</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="conteudo">
            <div id="form" data-n="<?php echo $n ?>">
                <div class="row form-group">
                    <h2 style="margin-bottom: 15px">Editando prova</h2>
                    <div class="col-sm-6">
                        <table width="100%" border="0" cellpadding="3" cellspacing="0" class="table">
                            <tr>
                                <td style="text-align: left;">
                                    <label>Matéria</label>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" id="materia" type="text" name="materia" alt="Matéria" data-ob="1" value="<?php echo $materia ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <label>Professor </label>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" id="professor" type="text" name="professor" alt="Professor" data-ob="1" value="<?php echo $professor ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <label>Data da Prova </label>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="text" alt="Data" id="data" data-ob="1" OnKeyUp="mascara_data(this.value)" name="dia" maxlength="5" value="<?php if(strlen($dia) == 1) echo "0".$dia; else echo $dia ?>/<?php if(strlen($mes) == 1) echo "0".$mes; else echo $mes ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td id="nota-label" style="text-align: left;padding-top: 18px;">
                                    <label>Nota</label>
                                </td>
                                <td id="nota-input" style="text-align: left;">
                                    <div style="height: 50px">
                                        <input class="form-control" type="text" alt="Nota" data-ob="0" id="nota" name="nota" value="<?php echo $nota ?>"/>
                                        <?php
                                        if ($nota == "" || $nota == null){
                                            echo "<input type='checkbox' id='check' name='entregue' checked value='0'>Prova não entregue ainda<br/><br/>";
                                        } else{
                                            echo "<input type='checkbox' id='check' name='entregue' value='0'>Prova não entregue ainda<br/><br/>";
                                        }
                                        ?>
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
                                        <?php
                                        if ($tipo == 1){
                                            echo "<option value=1 selected>N1</option>";
                                            echo "<option value=2 >N2</option>";
                                        }
                                        if ($tipo == 2){
                                            echo "<option value=1>N1</option>";
                                            echo "<option value=2 selected>N2</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <label>Bimestre </label>
                                </td>
                                <td style="text-align: left;">
                                    <select name="bimestre" id="bimestre" class="form-control" alt="Bimestre" data-ob="1">
                                        <?php
                                        if ($bimestre == 1){
                                            echo "<option value=1 selected>Primeiro</option>";
                                            echo "<option value=2 >Segundo</option>";
                                            echo "<option value=3 >Terceiro</option>";
                                            echo "<option value=4 >Quarto</option>";
                                        }
                                        if ($bimestre == 2){
                                            echo "<option value=1 >Primeiro</option>";
                                            echo "<option value=2 selected>Segundo</option>";
                                            echo "<option value=3 >Terceiro</option>";
                                            echo "<option value=4 >Quarto</option>";
                                        }
                                        if ($bimestre == 3){
                                            echo "<option value=1 >Primeiro</option>";
                                            echo "<option value=2 >Segundo</option>";
                                            echo "<option value=3 selected >Terceiro</option>";
                                            echo "<option value=4 >Quarto</option>";
                                        }
                                        if ($bimestre == 4){
                                            echo "<option value=1 >Primeiro</option>";
                                            echo "<option value=2 >Segundo</option>";
                                            echo "<option value=3 >Terceiro</option>";
                                            echo "<option value=4 selected >Quarto</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td id="anotacoes-label" style="text-align: left;">
                                    <label>Anotações </label>
                                </td>
                                <td id="anotacoes-input" style="text-align: left;">
                                    <textarea class="form-control" id="anotacoes" rows="3" alt="Anotações" data-ob="0" name="anotacoes"><?php echo $anotacoes ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id='retorno' style='margin-bottom: 5px;margin-top: 5px;display: none' class='alert alert-danger fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            </div>
            <button class="btn btn-success" style="margin-bottom: 5px" onclick="atualizar()">Atualizar</button>
            <button class="btn btn-danger" style="margin-bottom: 5px" onclick="location.href='home'">Cancelar</button>
            <button id="excluir" class="btn btn-danger" style="margin-bottom: 5px">Excluir prova</button>
        </div>
    </div>
    <div id="bgbox" style="display: none"></div>
    <div id="confirm" style="display: none">
        <p>Tem certeza?</p>
        <span id="n" style="display: none"><?php echo $n; ?>></span>
        <button class="btn btn-danger" onclick="sexcluir()">Sim</button>
        <button class="btn btn-danger" onclick="nexcluir()">Não</button>
    </div>
    <script type="text/javascript" src="assets/js/data.js"></script>
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

        function atualizar() {
            msg = '<ul class="list-group">';
            var n = $("#form").attr('data-n');
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
                $.post("editpd.php", {n:n, materia: materia, professor: professor, data:data, nota:nota, tipo:tipo, bimestre:bimestre, anotacoes:anotacoes, retorno:retorno}, function (get_retorno) {
                    complete:
                        if(get_retorno == 1){
                            window.location="home";
                        } else{
                            $("#retorno").show("slow").html(get_retorno);
                        }
                });
            }

        }
        $(function () {
            $("#excluir").bind("click", function () {
                $("#bgbox").show();
                $("#confirm").show('fast');
            })
        })
        function nexcluir() {
            $("#confirm").hide('fast');
            $("#bgbox").hide();
        }
        function sexcluir() {
            var n = $("#n").html();
            n = btoa(btoa(n));
            $.ajax(
                {
                    url: "excluir.php?n="+n,
                    cache: false
                })
                .done(function(result)
                {
                    var resp = result;
                    if(resp == 1){
                        window.location="home";
                    } else{
                        alert("Erro");
                    }
                });
            $("#confirm").hide('fast');
        }
    </script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>