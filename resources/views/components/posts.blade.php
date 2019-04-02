<div class="posts">
    <div class="card">
        <div class="card-header">
            <h2>POSTS</h2>
        </div>

        @foreach($posts as $post)
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
</div>
