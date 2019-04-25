@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @include('profile.profile', ['user' => auth()->user()])
            <div class="col-md-8">
                @include('projects.projects', ['user'=>auth()->user()])
                <br>
                @include('posts.posts', ['user' => auth()->user()])
            </div>
        </div>
    </div>
@endsection
