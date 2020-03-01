<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Watch;

class WatchController extends Controller
{

    public function listWatches($category){
        $data = [];
        $data["title"] = "Categoria de Reloj";
        $data["watch"] = Watch::where('category_id', $category)->get();

        return view('watch.list')->with("data", $data);
    }
}

?>
