<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:customer');
    }

    public function index(){
        $data = [];
        $data["title"] = "Orders";
        $data["orders"] = Order::orderBy('id', 'desc')->get();

        return view('customer.order.index')->with("data", $data);
    }
}

?>