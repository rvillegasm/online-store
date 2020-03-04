<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Watch;

class CarController extends Controller
{

    public function index() {
        $data = [];
        $data["title"] = "My Car";

        return view('customer.car.index')->with("data", $data);
    }
}

?>
