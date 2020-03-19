<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Item;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(){
        $data = [];
        $data["title"] = "Orders";
        $data["orders"] = Order::with('user')->orderBy('id', 'desc')->get();

        return view('admin.order.index')->with("data", $data);
    }

    public function show($orderId) {
        $data = [];
        $data["title"] = "Order details";
        $data["order"] = Order::with('user')->with('items.watch')->with('customerDetails')->where('id', $orderId)->first();

        return view('admin.order.show')->with("data", $data);
    }
}

?>