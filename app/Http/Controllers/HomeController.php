<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Watch;

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
        $watches = Watch::whereIn('id', $watchesIds)->get()->keyBy('id');
        
        $watchesInOrder = [];
        foreach ($watchesIds as $id) {
            $watchesInOrder[] = $watches[$id];
        }
        $data["watches"] = $watchesInOrder;

        return view('home.index')->with("data", $data);
    }

    public function search(Request $request){
        try {
            $watchObject = Watch::where('name', 'like', '%'.$request->watch.'%')->firstOrFail();
            return redirect()->route('watch.show' , ['watchId' => $watchObject->getId()]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('home.index')->with('Not Found','Watch not found!');;
        }   
    }
}
