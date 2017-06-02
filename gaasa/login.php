<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id'] != -1) {
    header("Location: relatorios");
}
require 'config.php';
if (isset($_SESSION['id']) && $_SESSION['id'] != -1){
    if ($_SESSION['retorno'] != null && $_SESSION['retorno'] != 0 ){
        if($_SESSION['retorno'] == 9){
            echo "<div id='retornosessao' style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-danger fade in\">
                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                Você precisa estar logado para fazer essa ação!
          </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Login</title>
    <link rel='shortcut icon' href="assets/imgs/logo.png" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <script type="text/javascript" src="assets/js/tether.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <style>
        body{
            background-image: url('assets/imgs/fundo1.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            height: 100%;
            font-family: 'Noto Sans', sans-serif;
        }
        h2{
            color: #fff;
            float: left;
            margin-top: 10px;
            border-bottom: solid 4.5px;
            font-family: 'Noto Sans', sans-serif;
            font-size: 38px;
        }
        .btnentrar{
            background-color: #1E90FF;
            border-color: #1E90FF;
        }

        .btnentrar:hover {
            background-color: #4682B4;
            border-color: #4682B4;
        }
        #caixa{
            border-radius: 10px;
            position: fixed;
            left: 50%;
            top: 50%;
            width: auto;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            transform: translate(-50%, -50%);
            min-width: 300px;
        }

        @media only screen and (max-width: 380px) {
            #caixa{
                max-width: 330px;
                margin-left: -165px;
                transform: translate(-00%, -50%);
                min-width: 0;
            }
        }
        @media only screen and (max-width: 330px) {
            #caixa{
                max-width: 280px;
                margin-left: -140px;
            }
        }
        .btn{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="caixa" class="form-group">
            <form method="POST">
                <img style="margin-bottom: 15px;float: left;width: 100px" src="assets/imgs/logo.png"/><h2>LOGIN</h2>
                <input class="form-control" type="text" id="email" data-ob="1" alt="E-mail" name="email" placeholder="E-mail"/><br/>
                <input class="form-control" type="password" name="senha" data-ob="1" alt="Senha" placeholder="Senha"/><br/>
                <input class="btn btn-info btnentrar" style="display: none" type="submit" name="enviar" id="enviar" value="Entrar" style="margin-right: 8px">
            </form>
            <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
                <ul class="list-group">
                    <li class="list-group-item">
                    </li>
                </ul>
            </div>
            <button class="btn btn-success" style="margin-right: 5px;margin-bottom: 5px" onclick="enviar()">Entrar</button>
            <button class="btn btn-danger" style="margin-right: 5px;margin-bottom: 5px" onclick="location.href='index'">Cancelar</button>
            <?php
                if(isset($_POST['email']) && empty($_POST['email']) == false){
                    $email = addslashes($_POST['email']);
                    if(isset($_POST['senha']) && empty($_POST['senha']) == false){
                        $senha = addslashes($_POST['senha']);
                        try{
                            $sql = $pdo->query("SELECT * FROM usuarios_gaasa WHERE email = '$email' AND senha = '$senha'");
                            if($sql->rowCount() > 0){
                                $sql = $sql->fetch();
                                $_SESSION['id'] = $sql['id'];
                                $_SESSION['retorno'] = 0;
                                header("Location: relatorios");
                            }
                            else{
                                echo "<div style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-danger\">
                                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                            E-mail ou senha incorretos!
                                      </div>";
                            }
                        } catch (PDOException $e){
                            echo "<div style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-danger\">
                                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                            Falhou ao conectar ao banco. Tente novamente mais tarde.
                                  </div>
                                  <script>
                                    console.log(".$e.");
                                  </script>";
                        }
                    }
                }
            ?>
        </div>
    </div>
    <script>
        var msg = '<ul class="list-group">';
        window.onload = function () {
            setTimeout(function () {
                if($("#retornosessao") != null){
                    $("#retornosessao").slideUp();
                }
            },3000)
        };

        function enviar() {
            msg = '<ul class="list-group">';
            if(validaForm() == -1) {
                $("#retorno").slideDown().html(msg);
            }else{
                $("#enviar").trigger("click");
            }
        }

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
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>