<?php
class SenangPay
{
    public $secret_key;
    public $merchant_code;
    public $gateway_url;

    public function __construct($secret_key, $merchant_code)
    {
        $this->secret_key = $secret_key;
        $this->merchant_code = $merchant_code;

        $this->gateway_url = "https://app.senangpay.my/payment/" . $merchant_code;
    }

    public function getPaymentUrl(SenangPayRequest $senangPayRequest)
    {
        $parameters = [
            'detail' => $senangPayRequest->detail,
            'amount' => $senangPayRequest->amount,
            'order_id' => $senangPayRequest->order_id,
            'hash' => $this->generateHash($senangPayRequest),
            'name' => $senangPayRequest->name,
            'email' => $senangPayRequest->email,
            'phone' => $senangPayRequest->phone,
        ];
        $url_query = http_build_query($parameters);
        return $this->gateway_url . '?' . $url_query;
    }

    private function generateHash(SenangPayRequest $senangPayRequest)
    {
        $secret_key = $this->secret_key;
        $detail = $senangPayRequest->detail;
        $amount = $senangPayRequest->amount;
        $order_id = $senangPayRequest->order_id;
        return hash_hmac('sha256', $secret_key . $detail . $amount . $order_id, $secret_key);
    }
}
