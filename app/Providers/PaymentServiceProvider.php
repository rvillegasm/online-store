<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Payment;
use App\Util\CreditCardPayment;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Payment::class, function (){
            return new CreditCardPayment();
        });
    }
}