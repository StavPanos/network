<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function create()
    {
        Post::create([
            'content'=>request()->content,
            'user_id'=>auth()->user()->id
        ]);

        return back();
    }
}
