<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('role:admin');
    }

    public function index(){
        $data = [];
        $data["title"] = "Orders";
        $data["orders"] = Order::with('user')->get();

        return view('admin.order.index')->with("data", $data);
    }
}

?>