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

        $watches = Watch::with('category')->whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        });

        switch($filter){
            case "all":
                $watches = $watches->orderBy('id', 'desc')->simplePaginate(3);
                break;
            case "name":
                $watches = $watches->orderBy('name')->simplePaginate(3);
                break;
            case "priceAsc":
                $watches = $watches->orderBy('price', 'asc')->simplePaginate(3);
                break;
            case "priceDesc":
                $watches = $watches->orderBy('price', 'desc')->simplePaginate(3);
                break;
            default:
                $watches = $watches->orderBy('id', 'desc')->simplePaginate(3);
                break;
        }

        $data["watches"] = $watches;
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
