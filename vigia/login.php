<?php
session_start();
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
if (isset($_SESSION['retorno']) && $_SESSION['retorno'] != null && $_SESSION['retorno'] != 0 ){
    if($_SESSION['retorno'] == 99){
        echo "<div id='retornosessao' style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-success fade in\">
                E-mail enviado com sucesso!
          </div>";
        $_SESSION['retorno'] = null;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <title>Login</title>
    <link rel='shortcut icon' href="assets/imgs/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style_home.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        function enviar() {
            $("#enviar").trigger("click");
        }
    </script>
    <style>
        @font-face {
            font-family: "Kitchen Police";
            src: url("assets/fonts/kitchenpolice.ttf");
        }
        body{
            background-color: #3E3E3E;
            color: white;
        }
        h2{
            font-family: "Kitchen Police";
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
            display: block;
            position: absolute;
            background-color: #3E3E3E;
            padding: 20px;
            border-radius: 10px;
            max-width: 380px;
            left: 50%;
            top:50%;
            margin-left: -180px;
            margin-top: -150px;
        }

        @media only screen and (max-width: 380px) {
            #caixa{
                max-width: 330px;
                margin-left: -165px;
            }
        }
        @media only screen and (max-width: 330px) {
            #caixa{
                max-width: 280px;
                margin-left: -140px;
            }
        }
        #link:hover{
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="caixa" class="form-group">
            <form method="POST">
                <img style="margin-bottom: 15px;float: left;" width="100" height="100" src="assets/imgs/seg_gg.png"/><h2 style="color: #fff;float: left;margin-top: 30px;margin-left: 10px;">LOGIN</h2>
                <input type="text" id="per" name="per" value="1" style="display: none">
                <input class="form-control" type="email" name="email" required placeholder="E-mail"/><br/>
                <input class="form-control" type="password" name="senha" required placeholder="Senha"/>
                <input type='checkbox' id='check' name='espec' value='1'> Espectador<br/><br/>
                <input class="btn btn-info btnentrar" style="display: none" type="submit" name="enviar" id="enviar" value="Entrar" style="margin-right: 8px">
            </form>
            <button class="btn btn-success" style="margin-right: 5px;margin-bottom: 5px" onclick="enviar()">Entrar</button>
            <button class="btn btn-danger" style="margin-right: 5px;margin-bottom: 5px" onclick="location.href='index'">Cancelar</button>
            <?php
                if(isset($_POST['email']) && empty($_POST['email']) == false){
                    $email = addslashes($_POST['email']);
                    if(isset($_POST['senha']) && empty($_POST['senha']) == false){
                        $senha = addslashes($_POST['senha']);
                        try{
                            $sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
                            if($sql->rowCount() > 0){
                                $sql = $sql->fetch();
                                $_SESSION['id'] = $sql['id'];
                                $_SESSION['permissao'] = $sql['permissao'];
                                $_SESSION['tabela'] = $sql['tabela'];
                                $_SESSION['retorno'] = 0;
                                if($_POST['per'] == 0){
                                    $_SESSION['permissao'] = 0;
                                }
                                header("Location: home");
                            }
                            else{
                                echo "<div style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-danger fade in\">
                                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                            E-mail ou senha incorretos!
                                      </div>";
                            }
                        } catch (PDOException $e){
                            echo "<div style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-danger fade in\">
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
            <br/>
            <span>Não tem cadastro? </span><a id="link" href="cadastrar">clique aqui para se cadastrar</a>
        </div>
    </div>
    <script>
        window.onload = function () {
            setTimeout(function () {
                if($("#retornosessao") != null){
                    $("#retornosessao").slideUp();
                }
            },3000)
        };
        $("#check").bind("click", function () {
            if ($("#per").val() == "1"){
                $("#per").val("0");
            }
            else if ($("#per").val() == "0"){
                $("#per").val("1");
            }
            console.log($("#per").val());
        })
    </script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>