<?php
$p = $_POST;
$p['qt_nome'] = strlen($_POST['nome']);
echo json_encode($p);
//Não ensinou ainda kkk
/*else{
    if(empty($_POST['email']) && empty($_POST['password'])){
        echo "Os campos e-mail e senha devem ser preenchidos!";
    }
    else if(empty($_POST['email'])){
        echo "O e-mail deve ser preenchido!";
    }
    else if (empty($_POST['password'])){
        echo "A senha deve ser preenchida!";
    }
    echo " Dados não Recebidos!";
}
*/