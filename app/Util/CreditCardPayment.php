<?php 

namespace App\Util;

use Exception;
use Lang;
use App\Interfaces\Payment;
use App\User;

class CreditCardPayment implements Payment 
{
    public function checkout($order, $paymentMethodInfo)
    {
        // $creditCardNumber = $paymentMethodInfo["number"];
        // $creditCardExpiration = $paymentMethodInfo["expiration"];
        // $cvv = $paymentMethodInfo["cvv"];
        $creditCardOwner = $paymentMethodInfo["owner"];

        $totalVal = 0;
        foreach ($order->items as $item) {
            $totalVal += $item->getSubTotal();
        }

        try {
            $owner = User::where('name', $creditCardOwner)->firstOrFail();
        }
        catch (Exception $exception) {
            throw new Exception(Lang::get("payment.No credit card"));
        }

        if (CreditCardPayment::verifyCreditCart($totalVal, $owner, $order)) {
            CreditCardPayment::pay($totalVal, $order, $owner);
        }
        else {
            throw new Exception(Lang::get("payment.Credit not valid"));
        }
        
    }

    private static function verifyCreditCart($totalVal, $owner, $order)
    {
        // here you would actually have to call an api or something
        // to verify the card, but what we do here is just verify if
        // the user has enough credits associated to his account    
        if ($owner == $order->user && $owner->getCredit() >= $totalVal) {
            return true;
        }
        else {
            return false;
        }
    }

    private static function pay($totalVal, $order, $owner)
    {
        // here you would actully pay using the credit card
        $owner->setCredit($owner->getCredit() - $totalVal);
        $order->setStatus("SHIPPED");

        $owner->save();
        $order->save();
    }
}