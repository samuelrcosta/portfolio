<?php
session_start();
if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $msg = addslashes($_POST['mensagem']);

    $para = "samuel.rcosta@hotmail.com.br";
    $assunto = "Contato do site";
    $corpo = "Nome: " . $nome . "\r\nE-mail: " . $email . "\r\nMensagem: " . $msg;

    $cabecalho = "From: ".$email."\r\n"."Reply-To: ".$email."\r\n"."X-Mailer: PHP/" . phpversion();

    mail($para, $assunto, $corpo, $cabecalho);

    echo "1";
    $_SESSION['retorno']=99;
}
?>