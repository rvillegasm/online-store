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
            if (!in_array($watchId, Session::get(SessionController::WATCHES))) {
                // add the watchId to session
                Session::push(SessionController::WATCHES, (int)$watchId);
                // add the quantity to session
                Session::push(SessionController::QUANTITY, (int)$request->quantity);
            }
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