<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
        $data["title"] = "Categories";
        $data["categories"] = Category::all();

        return view('admin.category.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new watch.
     *
     * @return view
     */
    public function create()
    {
        $data = [];
        $data["title"] = "Create a category";

        return view('admin.category.create')->with("data", $data);
    }

    /**
     * Store a newly watch.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        Category::validate($request);
        Category::create($request->only(["image", "name", "description"]));
        $message = [];
        $message["type"] = "success";
        $message["text"] = "Watch created successfully";

        return redirect()->route('admin.category.index')->with("message", $message);
    }
}

?>