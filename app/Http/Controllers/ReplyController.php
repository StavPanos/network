<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReply;
use App\Models\Post;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function create(StoreReply $reply)
    {
        $post = Post::find($reply->post_id);

        $reply_ = new Reply();

        $reply_->content = $reply->content;

        $reply_->user_id = auth()->user()->id;

        $post->replies()->save($reply_);

        return back();
    }

    public function destroy()
    {
        Reply::destroy(request()->id);

        return back();
    }
}
