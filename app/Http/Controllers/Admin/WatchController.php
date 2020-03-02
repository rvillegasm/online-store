<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class WatchController extends Controller
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
        return view('admin.watch.index');
    }
}

?>