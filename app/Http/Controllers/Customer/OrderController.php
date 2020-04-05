<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        $data = [];
        $data["title"] = "Orders";
        $data["orders"] = Order::where('user_id',Auth::user()->getId())->orderBy('id', 'desc')->get();

        return view('customer.order.index')->with("data", $data);
    }

    public function show($orderId)
    {
        $data = [];
        $data["title"] = "Order details";
        $data["order"] = Order::with('user')->with('items.watch')->with('customerDetails')->where('id', $orderId)->first();

        return view('customer.order.show')->with("data", $data);
    }
}

?>