<?php
session_start();
require "config.php";
require 'usuario.php';
require 'menu.php';
require 'pedido.php';
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){

} else{
    $_SESSION['retorno'] = 10;
    header("Location:login");
}
$usuario = new Usuario(addslashes($_SESSION['id']));
$id = addslashes(base64_decode(base64_decode($_GET['id'])));
$pedido = new Pedido($id);
if($pedido->getTipo() == 0){
    $tipo = "Criar MEI";
}else if($pedido->getTipo() == 1){
    $tipo = "Atualizar MEI";
}else if($pedido->getTipo() == 2){
    $tipo = "Baixa de CNPJ";
}

if($pedido->getStatus() == 0){
    $status = "Recebido";
} else if($pedido->getStatus() == 1){
    $status = "Em progresso";
} else if($pedido->getStatus() == 2){
    $status = "Concluído";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pedidos</title>
    <link rel="shortcut icon" href="assets/imgs/logo.jpg" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato%3A400%2C700%7CArimo%3A700&subset=latin&ver=1480945793
" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css?2" type="text/css" />
</head>
<body>
<?php inserirMenu($usuario, 1)?>
<div class="main">
    <?php echo "<h1 style='margin-bottom: 20px'>Pedido ".$id."</h1>" ?>
    <button class="btn btn-default" onclick="location.href = 'pedidos'">Voltar</button>
    <button class="btn btn-default" onclick="location.href = 'editarPedido?id=<?php echo base64_encode(base64_encode($id))?>'">Editar</button>
    <div class="box" style="margin-top: 10px">
        <div class="box-title">Detalhes do pedido</div>
        <div class="box-body">
            Tipo de Pedido: <strong><?php echo $tipo ?></strong>
            <br>
            Data da Compra: <?php echo explode(" ", explode("-",$pedido->getDatacompra())[2])[0]."/".explode("-",$pedido->getDatacompra())[1]."/".explode("-",$pedido->getDatacompra())[0]." às ".explode(" ", explode(":",$pedido->getDatacompra())[0])[1].":".explode(":",$pedido->getDatacompra())[1] ?>
            <br>
            Tipo do pagamento: <?php echo $pedido->getCondpag()?>
            <br>
            Data do Pagamento: <?php echo $pedido->getDatapagamento()?>
            <br>
            Status do Pedido: <?php echo $status?>
        </div>
    </div>
    <div class="box">
        <div class="box-title">Informações do Cliente</div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    function mostrar($nome, $var){
                        echo "<strong>".$nome."</strong>: ".$var."<br>";
                    }
                    if($pedido->getNome() != ""){
                        mostrar("Nome", $pedido->getNome());
                    }
                    if($pedido->getCPF() != ""){
                        mostrar("CPF", $pedido->getCPF());
                    }
                    if($pedido->getDatanasc() != ""){
                        mostrar("Data de Nascimento", converterData($pedido->getDatanasc()));
                    }
                    if($pedido->getEmail1() != ""){
                        mostrar("Email 1", $pedido->getEmail1());
                    }
                    if($pedido->getEmail2() != ""){
                        mostrar("Email 2", $pedido->getEmail2());
                    }
                    if($pedido->getTelefone() != ""){
                        mostrar("Telefone", $pedido->getTelefone());
                    }
                    if($pedido->getCelular() != ""){
                        mostrar("Celular", $pedido->getCelular());
                    }
                    if($pedido->getRg() != ""){
                        mostrar("RG", $pedido->getRg());
                    }
                    if($pedido->getRgorgao() != ""){
                        mostrar("Órgão Expeditor", $pedido->getRgorgao());
                    }
                    if($pedido->getCidade() != ""){
                        mostrar("Cidade", $pedido->getCidade());
                    }
                    if($pedido->getEstado() != ""){
                        mostrar("Estado", $pedido->getEstado());
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if($pedido->getOcprincipal() != ""){
                        mostrar("Ocupação Principal", $pedido->getOcprincipal());
                    }
                    if($pedido->getOcsecundaria() != ""){
                        mostrar("Ocupação Secundária", $pedido->getOcsecundaria());
                    }
                    if($pedido->getCapitalsocial() != ""){
                        mostrar("Capital Social", $pedido->getCapitalsocial());
                    }
                    if($pedido->getNomefantasia() != ""){
                        mostrar("Nome Fantasia", $pedido->getNomefantasia());
                    }
                    if($pedido->getEndlogradouro() != ""){
                        mostrar("Logradouro", $pedido->getEndlogradouro());
                    }
                    if($pedido->getEndnumero() != ""){
                        mostrar("Número", $pedido->getEndnumero());
                    }
                    if($pedido->getEndcomplemento() != ""){
                        mostrar("Complemento", $pedido->getEndcomplemento());
                    }
                    if($pedido->getEndbairro() != ""){
                        mostrar("Bairro", $pedido->getEndbairro());
                    }
                    if($pedido->getEndcidade() != ""){
                        mostrar("Cidade", $pedido->getEndcidade());
                    }
                    if($pedido->getEndestado() != ""){
                        mostrar("Estado", $pedido->getEndestado());
                    }
                    if($pedido->getEndcep() != ""){
                        mostrar("CEP", $pedido->getEndcep());
                    }
                    if($pedido->getImprendastatus() == "1"){
                        echo "<strong>Declarou Imposto de Renda?</strong> Sim <br> Número do Recibo de Imposto de Renda: ".$pedido->getImprendadoc();
                    }
                    if($pedido->getImprendastatus() == "0"){
                        echo "<strong>Declarou Imposto de Renda?</strong> Não <br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>