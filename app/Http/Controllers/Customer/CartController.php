<?php

namespace App\Http\Controllers\Customer;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Watch;
use App\Item;
use App\Order;
use App\CustomerDetails;
use App\Http\Controllers\SessionController;
use App\Interfaces\Payment;

class CartController extends Controller
{
    private const WATCHES = 'watches';
    private const QUANTITY = 'quantity';
    private const TOTAL = 'total';

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
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
        $total = 0;
        for($i = 0; $i < count($watches); $i++) {
            $total += $watches[$i]->getPrice() * $sessionQuantities[$i];
        }
        $data[CartController::TOTAL] = $total;

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
        $order->setStatus("PENDING");
        $order->setUserId(auth()->user()->getId());

        $items = [];
        $total = 0;
        
        // create an item for every watch
        for($i = 0; $i < count($watches); $i++) {
            $item = new Item;
            $item->setProductQuantity($sessionQuantities[$i]);
            $sub_total = $watches[$i]->getPrice() * $item->getProductQuantity();
            $total = $total + $sub_total;
            $item->setSubTotal($sub_total);
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
        $order->setTotal($total);

        // Use a payment method to confirm the order
        $paymentInterface = app(Payment::class);
        try {
            $paymentInterface->checkout($order, $request->input('paymentInfo'));
        }
        catch (Exception $exception) {
            return redirect()
                ->back()
                ->with('error', $exception->getMessage())
                ->withInput($request->input());
        }
        
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

        SessionController::clear();
        
        return redirect()
            ->route('cart.index')
            ->with('success', 'Your purchase was successful!');
    }
}

?>
