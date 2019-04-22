<?php /** @noinspection Annotator */

/** @noinspection Annotator */

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post;

class PostController extends Controller
{
    public function create(StorePost $request)
    {
        $request->validated();

        Post::create([
            'content' => request()->content,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('success', 'Post created successfully!');
    }

    public function destroy()
    {
        Post::destroy(request()->post_id);

        return back()->with('success', 'Post deleted successfully!');
    }
}
