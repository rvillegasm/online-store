<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Watch;

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
        $data = [];
        $data["title"] = "Watches";
        $data["watches"] = Watch::with('category')->get();

        return view('admin.watch.index')->with("data", $data);
    }
}

?>