<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    private const WATCHES = 'watches';
    private const QUANTITY = 'quantity';
    
    public function put(Request $request, $watchId)
    {
        if (Session::has(SessionController::WATCHES)) {
            $watches =  Session::get(SessionController::WATCHES);
            if (!in_array($watchId, $watches)) {
                // add the watchId to session
                Session::push(SessionController::WATCHES, (int)$watchId);
            }
            // add the quantity to session
            $quantities = Session::pull(SessionController::QUANTITY, []);
            if (($key = array_search($watchId, $watches)) !== false)
            {
                $quantities[$key] = (int)$request->quantity;
            }
            Session::put(SessionController::QUANTITY, $quantities);
        }
        else {
            Session::put(SessionController::WATCHES, [(int)$watchId]);
            Session::put(SessionController::QUANTITY, [(int)$request->quantity]);
        }

        return back();
    }

    public function delete($watchId)
    {
        if (Session::has(SessionController::WATCHES))
        {
            $watches = Session::pull(SessionController::WATCHES, []);
            $quantities = Session::pull(SessionController::QUANTITY, []);
            if (($key = array_search($watchId, $watches)) !== false)
            {
                unset($watches[$key]);
                unset($quantities[$key]);
            }
            Session::put(SessionController::WATCHES, $watches);
            Session::put(SessionController::QUANTITY, $quantities);
        }

        return back();
    }

    public static function clear() {
        Session::forget('watches');
        Session::forget('quantity');
    }
}

?>