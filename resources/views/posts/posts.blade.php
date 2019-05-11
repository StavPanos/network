<div class="card mt-3">
    <div class="card-header">
        Add post
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
                        <textarea name="content" class="form-control" rows="4" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        @endif
    @endif
</div>

<div class="card mt-3">
    <div class="card-header">
        My posts
    </div>

    <div class="card-body">
        @foreach($user->posts as $post)
            <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        {{$post->created_at->diffForHumans()}}
                    </div>

                    <div class="card-body">
                        @if(auth()->check())
                            @if(auth()->user()->id == $user->id)
                                <form action="/post/delete" method="post" class="d-inline">
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <button type="submit" class="ml-3">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        @endif
                        {{$post->content}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
