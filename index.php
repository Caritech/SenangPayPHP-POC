<?php

include_once 'Classes/SenangPay.php';
include_once 'Classes/SenangPaySandBox.php';
include_once 'Classes/SenangPayRequest.php';

//INIT SenangPay  Object
$secret_key = '3344-810';
$merchant_code = '321161465191075';
$senangPay = new SenangPaySandBox($secret_key, $merchant_code);
//$senangPay = new SenangPay($secret_key, $merchant_code);

//INIT SenangPay Request Object
$arr = [
    'detail' => 'Sameple APmyen',
    'amount' => rand(1, 999),
    'order_id' => rand(100000, 999999),
    'name' => 'Test Name',
    'email' => 'test@caritech.com',
    'phone' => '12125745',
];
$senangPayRequest = new SenangPayRequest($arr);


$payment_url = $senangPay->getPaymentUrl($senangPayRequest);

echo $payment_url;
