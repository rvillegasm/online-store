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

    public function delete($watchId)
    {
        if (Session::has(SessionController::WATCHES))
        {
            $watches = Session::pull(SessionController::WATCHES, []);
            if (($key = array_search($watchId, $watches)) !== false)
            {
                unset($watches[$key]);
            }
            Session::put(SessionController::WATCHES, $watches);
        }

        return back();
    }
}

?>