<?php
class SenangPaySandBox extends SenangPay
{
    public function __construct($secret_key, $merchant_code)
    {
        parent::__construct($secret_key, $merchant_code);
        $this->gateway_url = "https://sandbox.senangpay.my/payment/" . $merchant_code;
    }
}
