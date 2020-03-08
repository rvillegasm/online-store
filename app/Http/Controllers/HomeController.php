<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Watch;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data["categories"] = Category::all();
        $watchesSales = DB::table('items')
                                        ->select('watch_id', DB::raw('SUM(product_quantity) as total_sales'))
                                        ->groupBy('watch_id')->orderBy('total_sales','desc')->limit(20)->get();
        $watchesIds = [];
        foreach ($watchesSales as $watchSales) {
            $watchesIds[] = $watchSales->watch_id;
        }
        $data["watches"] = Watch::find($watchesIds);

        return view('home.index')->with("data", $data);
    }
}
