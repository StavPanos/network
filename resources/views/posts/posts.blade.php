@if(auth()->check())
    @if($user->id == auth()->user()->id)
        <div class="card height-scroll mt-3">
            <div class="card-header">
                Add post
            </div>


            <div class="card-body">
                <form method="post" action="post/create">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="comment">
                            Add post
                        </label>
                        <textarea name="content" class="form-control" rows="4" id="comment"></textarea>
                    </div>

                    @if($errors->has('content'))
                        <div class="mb-3">
                            <span class="invalid" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endif

<div class="card mt-3">
    <div class="card-header">
        Posts
    </div>

    <div class="card-body">
        @foreach($user->posts as $post)
            <div class="card">
                <div class="card-header">
                    {{$post->created_at->diffForHumans()}}
                    @if(auth()->check())
                        @if(auth()->user()->id == $user->id)
                            <form action="/post/delete" method="post" class="d-inline">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <button type="submit" class="ml-3 bg-transparent border-0">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    @endif
                </div>

                <div class="card-body">
                    {{$post->content}}
                </div>
            </div>
        @endforeach
    </div>
</div>
