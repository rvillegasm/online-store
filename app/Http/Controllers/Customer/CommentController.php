<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
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
             "description", "watch_id"
        ]));

        return redirect()->route('watch.show' , ['watchId' => $request->watch_id]);
    }
}

?>
