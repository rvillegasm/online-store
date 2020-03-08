<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use App\Watch;

class CartController extends Controller
{
    private const WATCHES = 'watches';

    public function index()
    {
        $data = [];
        $data["title"] = "My Cart";
        
        // get the list of watches from the session
        $sessionWatches = [];
        if (Session::has(CartController::WATCHES)) {
            $sessionWatches = Session::get(CartController::WATCHES);
        }
        // query for the models (using where(array))
        $watches = Watch::where(function ($query) use ($sessionWatches) {
            foreach ($sessionWatches as $watchId) {
                $query->orWhere('id', $watchId);
            }
        })->get();
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
