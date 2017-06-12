<?php

require_once ('mercadopago.php');

//pegue suas credenciais no link https://www.mercadopago.com/mlb/account/credentials

$mp = new MP('TEST-2829146815726656-062818-13e9fb907b74b0f8eb859221bced0228__LA_LD__-171180338'); //insira aqui o access token

$payment_data = array(
    "transaction_amount"   => 100, //valor da compra
    "token"                => $_POST['token'], //token gerado pelo javascript da home.php
    "description"          => "Title of what you are paying for", //descrição da compra
    "installments"         => intval($_POST['installments']), //parcelas
    "payment_method_id"    => $_POST['paymentMethodId'], //forma de pagamento (visa, master, amex...)
    "payer"                => array ("email" => "test@testuser.com"), //e-mail do comprador
    "statement_descriptor" => "SUA EMPRESA" //nome para aparecer na fatura do cartão do cliente
);

$payment = $mp->post("/v1/payments", $payment_data);

echo "<pre>";
print_r($payment);

?>