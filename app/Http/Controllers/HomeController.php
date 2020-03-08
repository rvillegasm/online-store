<?php

namespace App\Http\Controllers;
use App\Watch;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function search(Request $request){
        try {
            $watchObject = Watch::where('name', $request->watch)->firstOrFail();
            return redirect()->route('watch.show' , ['watchId' => $watchObject->getId()]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('home.index')->with('Not Found','Watch not found!');;
        }   
    }
}
