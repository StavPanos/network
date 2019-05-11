<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReply;
use App\Models\Post;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function create(StoreReply $request)
    {
        $request->validated();

        $post = Post::find($request->post_id);

        $reply = new Reply();

        $reply->content = $request->content;

        $reply->user_id = auth()->user()->id;

        $post->replies()->save($reply);

        return back()->with('success', 'Reply created successfully!');
    }

    public function destroy()
    {
        Reply::destroy(request()->id);

        return back();
    }
}
