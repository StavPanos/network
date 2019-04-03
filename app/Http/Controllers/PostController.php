<?php /** @noinspection Annotator */

/** @noinspection Annotator */

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        Post::create([
            'content' => request()->content,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('success', 'Post created successfully!');
    }
}
