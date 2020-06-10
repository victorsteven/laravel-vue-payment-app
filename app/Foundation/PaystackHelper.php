<?php

namespace App\Foundation;

class PaystackHelper
{
    public function getUsableConnection()
    {
        dd(config('paystack.connections'));
    }
}
