<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Watch;

class WatchController extends Controller
{

    public function list($categoryName, $filter) {
        $data = [];
        $data["title"] = "Categoria de Reloj";
        $data["watchesCategory"] = $categoryName;

        if($filter == "all") {
            $data["watch"] = Watch::with('category')->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            })
            ->simplePaginate(3);
        }
        elseif($filter == "name") {
            $data["watch"] = Watch::with('category')->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            })
            ->orderBy('name')
            ->simplePaginate(3);
        }
        elseif($filter == "priceAsc") {
            $data["watch"] = Watch::with('category')->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            })
            ->orderBy('price', 'asc')
            ->simplePaginate(3);
        }
        elseif($filter == "priceDesc") {
            $data["watch"] = Watch::with('category')->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            })
            ->orderBy('price', 'desc')
            ->simplePaginate(3);
        }

        return view('customer.watch.list')->with("data", $data);
    }

    public function show($id)
    {
        $data = []; 
        $watch = Watch::findOrFail($id);
        $data["watch"] = $watch;
        
        return view('customer.watch.show')->with("data",$data);
    }
}

?>
