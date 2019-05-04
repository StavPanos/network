@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Dashboard</h2>

                        <form method="post" action="post/create" class="mt-5">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="comment">
                                    Add a post
                                </label>
                                <textarea name="content" class="form-control" rows="2" id="comment"></textarea>
                            </div>

                            @if ($errors->has('content'))
                                <span class="invalid-" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse($friends as $friend)
                            @if($friend->posts)
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <img src="{{$friend->avatar}}" alt="">
                                        <a class="link" href="profile/{{$friend->id}}">{{$friend->name}}</a>
                                        posted {{$friend->posts->first()->created_at->diffForHumans()}}
                                    </div>
                                    <div class="card-body">
                                        {{$friend->posts->first()->content}}
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p>No posts</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
