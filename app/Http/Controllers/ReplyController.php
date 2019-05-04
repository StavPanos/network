<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function create()
    {
        $post = Post::find(request()->post_id);

        $reply = new Reply();

        $reply->content = request()->content;

        $reply->user_id = auth()->user()->id;

        $post->replies()->save($reply);

        return back();
    }

    public function destroy()
    {
        $reply = Reply::find(request()->id);

        $reply->destroy();

        return back();
    }
}
