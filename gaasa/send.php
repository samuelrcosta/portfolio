<?php
session_start();
if(sizeof($_POST) > 0){
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
        if(isset($_POST['email']) && !empty($_POST['email'])){
            if(isset($_POST['assunto']) && !empty($_POST['assunto'])){
                if(isset($_POST['mensagem']) && !empty($_POST['mensagem'])){
                    if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
                        $nome = addslashes($_POST['nome']);
                        $empresa = addslashes($_POST['empresa']);
                        $telefone = addslashes($_POST['telefone']);
                        $tipo = addslashes($_POST['tipo']);
                        $assuntocontato = addslashes($_POST['assunto']);
                        $email = addslashes($_POST['email']);
                        $msg = addslashes($_POST['mensagem']);

                        $enviaFormularioParaNome = 'Vendas';
                        $enviaFormularioParaEmail = 'vendas@gaasa.com.br';

                        $caixaPostalServidorNome = 'Contato do site';
                        $caixaPostalServidorEmail = 'contato@gaasa.com.br';
                        $caixaPostalServidorSenha = 'Mtr957b5';


                        $remetenteNome  = $nome;
                        $remetenteEmail = $email;
                        $mensagem = $msg;

                        $mensagemConcatenada = 'Formulário gerado via website'.'<br/>';
                        $mensagemConcatenada .= '-------------------------------<br/><br/>';
                        $mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>';
                        $mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>';
                        $mensagemConcatenada .= 'Empresa: '.$empresa.'<br/>';
                        $mensagemConcatenada .= 'Telefone: '.$telefone.'<br/>';
                        $mensagemConcatenada .= 'Assunto: '.$assuntocontato.'<br/>';
                        $mensagemConcatenada .= '-------------------------------<br/><br/>';
                        $mensagemConcatenada .= 'Mensagem: <br/> '.$mensagem.'<br/>';

                        require 'PHPMailer-master/PHPMailerAutoload.php';

                        $mail = new PHPMailer;

                        $mail->IsSMTP();
                        $mail->SMTPAuth  = true;
                        $mail->Charset   = 'utf8_decode()';
                        $mail->Host  = 'smtp.gaasa.com.br';
                        $mail->Port  = '587';
                        $mail->Username  = $caixaPostalServidorEmail;
                        $mail->Password  = $caixaPostalServidorSenha;
                        $mail->From  = $caixaPostalServidorEmail;
                        $mail->FromName  = utf8_decode($caixaPostalServidorNome);
                        $mail->IsHTML(true);
                        $mail->Subject  = utf8_decode($caixaPostalServidorNome);
                        $mail->Body  = utf8_decode($mensagemConcatenada);
                        $mail->addReplyTo($email, $nome);

                        if($tipo == "1"){
                            $para = "vendas@gaasa.com.br";
                            $enviaFormularioParaNome = 'Vendas';
                            $enviaFormularioParaEmail = $para;
                        } else if($tipo == "2"){
                            $para = "compras@gaasa.com.br";
                            $para2 = "istoquima@gaasa.com.br";
                            $enviaFormularioParaNome = 'Compras';
                            $enviaFormularioParaEmail = $para;
                            $mail->addCC($para2, 'Istoquima');
                        } else{
                            echo "Falha ao escolher o tipo de contato.";
                        }

                        $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

                        if(!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                            echo 1;
                            $_SESSION['retorno']=99;
                        }

                    }else{
                        echo "Tipo vazio!";
                    }
                }else{
                    echo "Mensagem vazia!";
                }
            }else{
                echo "Assunto vazio!";
            }
        }else{
            echo "E-mail vazio!";
        }
    }else{
        echo "Nome vazio!";
    }
}else{
    header('Location:index');
}
?>