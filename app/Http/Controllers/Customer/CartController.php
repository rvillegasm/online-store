<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Watch;

class CartController extends Controller
{

    public function index()
    {
        $data = [];
        $data["title"] = "My Cart";

        return view('customer.cart.index')->with("data", $data);
    }

    public function checkout()
    {
        $data = [];
        $data["title"] = "Checkout";

        return view('customer.cart.checkout')->with("data", $data);
    } 
}

?>
