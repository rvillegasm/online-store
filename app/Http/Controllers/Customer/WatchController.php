<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Watch;

class WatchController extends Controller
{

    public function list($categoryId) {
        $data = [];
        $data["title"] = "Categoria de Reloj";
        $data["watch"] = Watch::where('category_id', $categoryId)->get();

        return view('customer.watch.list')->with("data", $data);
    }
}

?>
