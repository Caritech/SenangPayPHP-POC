<?php
class SenangPayRequest
{
    public $detail;
    public $amount;
    public $order_id;
    public $name;
    public $email;
    public $phone;

    function __construct($arr)
    {
        foreach ($arr as $k => $v) {
            $this->{$k} = $v;
        }
    }
}
