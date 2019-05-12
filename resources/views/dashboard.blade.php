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

                                    @include('replies.index', ['friend' => $friend])
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

                            @if($errors->has('content'))
                                @if($errors->first('content') == 'Content is required')
                                    <div class="mb-3">
                                        <span class="invalid" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
