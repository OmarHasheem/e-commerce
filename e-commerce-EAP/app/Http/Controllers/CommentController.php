<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store() {
        request()->validate([
            'body' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'body' => request('body'),
            'product_id' => request('product_id'),
        ]);

        return back();
    }
}
