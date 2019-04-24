<div class="card">
    <div class="card-header">
        <h2>POSTS</h2>
    </div>

    @if($user->id == auth()->user()->id)
        <div class="card-body">
            <form method="post" action="post/create">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="comment">
                        Share a thought
                    </label>
                    <textarea name="content" class="form-control" rows="2" id="comment"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    @endif

    @foreach($user->posts as $post)
        <div class="card-body">
            Posted {{$post->created_at->diffForHumans()}}
            @if($post->user->id != auth()->user()->id)
                by {{$post->user->name}}
            @endif

            <hr>

            {{$post->content}}
        </div>
    @endforeach
</div>
