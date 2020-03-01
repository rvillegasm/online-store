<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class WatchController extends Controller
{
    public function index(){
        return view('admin.watch.index');
    }
}

?>