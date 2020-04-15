<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Watch;
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
     * Store a new category.
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

    /**
     * Delete a category. It also deletes every watch
     * that belongs to that category.
     *
     * @param  Integer $id
     * @return view
     */
    public function delete($id)
    {
        Watch::where('category_id', $id)->delete();
        Category::destroy($id);
        $message = [];
        $message["type"] = "success";
        $message["text"] = "Category deleted successfully";

        return redirect()->route('admin.category.index')->with("message", $message);
    }
}

?>