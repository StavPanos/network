<div class="card">
    <div class="card-header">
        Posts
    </div>

    @if(auth()->check())
        @if($user->id == auth()->user()->id)
            <div class="card-body">
                <form method="post" action="post/create">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="comment">
                            Add post
                        </label>
                        <textarea name="content" class="form-control" rows="2" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        @endif
    @endif

    @foreach($user->posts as $post)
        <div class="card-body">
            {{$post->created_at->diffForHumans()}}

            @if(auth()->check())
                @if(auth()->user()->id == $user->id)
                    <form action="/post/delete" method="post" class="d-inline">
                        {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit" class="ml-3 btn btn-link">
                            <i class="fa fa-trash text-black"></i>
                        </button>
                    </form>
                @endif
            @endif

            <hr>

            <p>
                {{$post->content}}
            </p>
        </div>
    @endforeach
</div>
