<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Watch;
use App\Category;
use App\Exports\WatchesExport;
use Maatwebsite\Excel\Facades\Excel;

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


    /**
     * Display a listing of the watches.
     *
     * @return view
     */
    public function index(){
        $data = [];
        $data["title"] = "Watches";
        $data["watches"] = Watch::with('category')->get();

        return view('admin.watch.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new watch.
     *
     * @return view
     */
    public function create()
    {
        $categories = Category::all();
        $data = [];
        $data["title"] = "Create a watch";
        $data["categories"] = $categories;

        return view('admin.watch.create')->with("data", $data);
    }

    /**
     * Store a newly watch.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        Watch::validate($request);
        Watch::create($request->only([
            "name", "brand", "reference", "color", "price", "quantity", "image", "gender", "description","category_id"
        ]));
        $message = [];
        $message["type"] = "success";
        $message["text"] = "Watch created successfully";

        return redirect()->route('admin.watch.index')->with("message", $message);
    }

    /**
     * Delete a watch.
     *
     * @param  Integer $id
     * @return view
     */
    public function delete($id)
    {
        Watch::destroy($id);
        $message = [];
        $message["type"] = "success";
        $message["text"] = "Watch deleted successfully";

        return redirect()->route('admin.watch.index')->with("message", $message);
    }

    public function export() 
    {
        return Excel::download(new WatchesExport, 'watches.xlsx');
    }
}

?>