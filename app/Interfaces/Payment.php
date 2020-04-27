<?php 

namespace App\Interfaces;

interface Payment 
{
    public function checkout($order, $paymentMethodInfo);
}
