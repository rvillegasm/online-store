<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use App\Watch;
use App\Item;
use App\Order;
use App\CustomerDetails;
use App\Http\Controllers\SessionController;

class CartController extends Controller
{
    private const WATCHES = 'watches';
    private const QUANTITY = 'quantity';

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
        $sessionQuantities = [];
        if (Session::has(CartController::WATCHES)) {
            $sessionWatches = Session::get(CartController::WATCHES);
            $sessionQuantities = Session::get(CartController::QUANTITY);
        }

        $watches = Watch::find($sessionWatches);
        $data[CartController::WATCHES] = $watches;
        $data[CartController::QUANTITY] = $sessionQuantities;

        return view('customer.cart.index')->with("data", $data);
    }

    public function checkout(Request $request)
    {
        $data = [];
        $data["title"] = "Checkout";

        $sessionWatches = [];
        $sessionQuantities = [];
        if (Session::has(CartController::WATCHES)) {
            $sessionWatches = Session::get(CartController::WATCHES);
            $sessionQuantities = Session::get(CartController::QUANTITY);
        }

        $watches = Watch::find($sessionWatches);
        $data[CartController::WATCHES] = $watches;
        $data[CartController::QUANTITY] = $sessionQuantities;

        return view('customer.cart.checkout')->with("data", $data);
    } 

    public function process(Request $request)
    {
        CustomerDetails::validate($request);
        $data = [];
        $data["title"] = "Process";

        $sessionWatches = [];
        $sessionQuantities = [];
        if (Session::has(CartController::WATCHES)) {
            $sessionWatches = Session::get(CartController::WATCHES);
            $sessionQuantities = Session::get(CartController::QUANTITY);
        }

        $watches = Watch::find($sessionWatches);
        
        // create the order
        $order = new Order;
        $order->setDateShipped(now());
        $order->setStatus("PENDING");
        $order->setUserId(auth()->user()->getId());

        $items = [];
        // create an item for every watch
        for($i = 0; $i < count($watches); $i++) {
            $item = new Item;
            $item->setProductQuantity($sessionQuantities[$i]);
            $item->setSubTotal($watches[$i]->getPrice() * $item->getProductQuantity());
            $item->setWatchId($watches[$i]->getId());
            $items[] = $item;
            // check if the quantity can be done correctly
            $watchQuantity = $watches[$i]->getQuantity();
            $desiredItemQuantity = $item->getProductQuantity();
            if ($watchQuantity - $desiredItemQuantity >= 0) {
                // update product quantity
                $watches[$i]->setQuantity($watchQuantity - $desiredItemQuantity);
            } else {
                return redirect()
                    ->route('cart.index')
                    ->with('error', 'Cannot buy that many watches of: '.$watches[$i]->getName());
            }
        }

        SessionController::clear();
        
        $customerDetails = CustomerDetails::create($request->only([
            "name", "adress", "phone_number", "zip"
        ]) + ["user_id" => auth()->user()->getId()]);
        
        // save the order
        $order->setCustomerDetails($customerDetails->getId());
        $order->save();

        for($i = 0; $i < count($watches); $i++) {
            // save the product updated
            $watches[$i]->save();
            // save the item
            $items[$i]->setOrderId($order->getId());
            $items[$i]->save();
        }
        
        return redirect()
            ->route('cart.index')
            ->with('success', 'Your purchase was successful!');
    }
}

?>
