<?php

namespace App\Abstracts;

abstract class Gateways
{
    protected $paymentObject;
    protected $params;
    protected $orderObject;

    public function __construct()
    {

    }

    abstract public function setParams($params);

    abstract public function setDefaultParams();

    abstract public function validation();

    abstract public function purchase();

    abstract public function completePurchase();

    public function setOrderObject($booking_id)
    {
        if (!$this->orderObject || ($this->orderObject && $this->orderObject->ID != $booking_id)) {
            $this->orderObject = get_booking($booking_id);
        }
    }

    protected function returnUrl()
    {
        return thankyou_url();
    }

    public function successUrl($status = 1)
    {
        $args = [
            '_payment' => $this->orderObject->payment_type,
            '_orderID' => $this->orderObject->ID,
            '_orderEncrypt' => hh_encrypt($this->orderObject->ID),
            '_tokenCode' => $this->orderObject->token_code,
            '_status' => $status
        ];
        $args['_hash'] = $this->createHash($args);

        return add_query_arg($args, $this->returnUrl());
    }

    public function cancelUrl()
    {
        $args = [
            '_payment' => $this->orderObject->payment_type,
            '_orderID' => $this->orderObject->ID,
            '_orderEncrypt' => hh_encrypt($this->orderObject->ID),
            '_tokenCode' => $this->orderObject->token_code,
            '_status' => 0,
        ];
        $args['_hash'] = $this->createHash($args);

        return add_query_arg($args, $this->returnUrl());
    }

    public function createHash($data)
    {
        $hash_string = '';
        foreach ($data as $key => $item) {
            $hash_string .= $item . '|';
        }
        $hash_string = substr($hash_string, 0, -1);
        return md5($hash_string);
    }

    protected function convertPrice($price, $currency)
    {
        $currency = maybe_unserialize($currency);
        $price = (float)$price * (float)$currency['exchange'];
        $price = number_format($price, $currency['currency_decimal'], '.', '');
        return $price;
    }

    protected function getCurrencyUnit($currency)
    {
        $currency = maybe_unserialize($currency);
        return $currency['unit'];
    }
}
