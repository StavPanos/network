@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Newsfeed
                    </div>

                    <div class="card-body">
                        @forelse($friends as $friend)
                            @if($friend->posts->first())
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{$friend->avatar}}" alt="">
                                        <a class="link" href="profile/{{$friend->id}}">{{$friend->name}}</a>
                                        posted {{$friend->posts->first()->created_at->diffForHumans()}}
                                    </div>

                                    <div class="card-body border-bottom">
                                        {{$friend->posts->first()->content}}
                                    </div>

                                    <div class="container height-scroll">
                                        <form method="post" action="reply/create" class="mt-2">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$friend->posts->first()->id}}" name="post_id">

                                            <div class="form-group">
                                                <label for="reply">
                                                    Reply
                                                </label>
                                                <textarea name="content" class="form-control" rows="2"
                                                          id="comment"></textarea>
                                            </div>

                                            @if($errors->has('reply.content'))
                                                <span class="invalid-" role="alert">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Submit</button>
                                            </div>
                                        </form>

                                        @foreach($friend->posts->first()->replies as $reply)
                                            <div class="card">
                                                <div class="card-header">
                                                        <a href="/profile/{{$reply->user->id}}">{{$reply->user->name}}</a>
                                                         commented {{$reply->created_at->diffForHumans()}}

                                                    <form method="post" action="reply/delete" class="mt-2 d-inline">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$reply->id}}" name="id">

                                                        <div class="form-group">
                                                            <button type="submit" class="bg-transparent border-0">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-body">
                                                    {{$reply->content}}
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @empty
                            Nothing at this moment
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Post
                    </div>

                    <div class="card-body">
                        <form method="post" action="post/create">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="comment">
                                    Add a post
                                </label>
                                <textarea name="content" class="form-control" rows="4" id="comment"></textarea>
                            </div>

                            @if ($errors->has('content'))
                                <span class="invalid-" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
