<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new Comment
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only([
             'description', 'watch_id', 'user_id'
        ]) + ['user_id' => Auth::user()->getId()]);

        return redirect()->route('watch.show' , ['watchId' => $request->watch_id]);
    }
}

?>
