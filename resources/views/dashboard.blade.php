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
                                    Share a thought
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

                        @forelse($posts as $post)
                            <div class="card mt-3">
                                <div class="card-header">
                                    <img src="{{$post->user->avatar}}" alt="">
                                    <a class="link" href="profile/{{$post->user->id}}">{{$post->user->name}}</a>
                                    posted  {{$post->created_at->diffForHumans()}}
                                    <form action="/post/delete" method="post" class="d-inline">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <button type="submit" class=" ml-3 btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    {{$post->content}}
                                </div>
                            </div>
                        @empty
                            <p>No posts</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
