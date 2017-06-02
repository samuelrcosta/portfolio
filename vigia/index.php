<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>School Guard</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style-index.css"/>
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
    <div class="principal">
        <nav>
            <div id="topo">
                <div>
                    <a href="index"><img id="img-topo" height="50px" src="assets/imgs/seg_gg.png"></a>
                    <a href="index"><h3 class="titulo-topo">School Guard</h3></a>
                </div>
                <div>
                    <div id="dropdown">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="cadastrar">Cadastrar</a></li>
                            <li class="list-group-item"><a href="login">Entrar</a></li>
                        </ul>
                    </div>
                    <div class="botao-topo-responsivo">
                        <img id="img" src="assets/imgs/menu-button.png">
                    </div>
                    <button class="btn btn-success botao-topo-cadastrar" onclick="location.href='cadastrar'"">Cadastrar</button>
                    <button class="btn btn-info botao-topo-entrar" onclick="location.href='login'">Entrar</button>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="content">
                <div id="content-msg">Verifique o desempenho do aluno no ano letivo</div>
                <br>
                Cadastre as provas<br>
                Monitore a entrega das notas do aluno<br>
                Consulte o boletim<br>
                Veja o necessário para atingir a média<br>
                Experimente o gerenciador de provas School Guard<br><br>
                <div align="center">
                    <button class="btn btn-success botao-cadastrar" onclick="location.href='cadastrar'">Cadastre-se - Totalmente grátis</button>
                    <br>
                    <div style="font-size: 15px">Já tem cadastro? <a href="login">Entrar</a></div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                Desenvolvido por Samuel Costa - (62) 98536-7212 <a href="enviar" class="contato">Entrar em contato</a>
            </div>
        </footer>
    </div>
</body>
<script type="text/javascript">
    $('.botao-topo-responsivo').bind('click', function () {
        $('#dropdown').slideToggle();
        if($('#img').attr('src') == "assets/imgs/menu-button.png")
            $('#img').attr('src','assets/imgs/menu-cancel.png');
        else
            $('#img').attr('src','assets/imgs/menu-button.png');
    });
</script>
</html>