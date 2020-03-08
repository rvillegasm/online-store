<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use App\Watch;

class CartController extends Controller
{
    private const WATCHES = 'watches';

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:customer')->except('index');
    }

    public function index()
    {
        $data = [];
        $data["title"] = "My Cart";
        // get the list of watches from the session
        $sessionWatches = [];
        if (Session::has(CartController::WATCHES)) {
            $sessionWatches = Session::get(CartController::WATCHES);
        }
        $watches = Watch::find($sessionWatches);
        $data[CartController::WATCHES] = $watches;

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
