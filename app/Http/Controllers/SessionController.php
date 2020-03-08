<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    private const WATCHES = 'watches';
    
    public function put($watchId)
    {
        if (Session::has(SessionController::WATCHES)) {
            Session::push(SessionController::WATCHES, $watchId);
        }
        else {
            Session::put(SessionController::WATCHES, [$watchId]);
        }

        return back();
    }
}

?>