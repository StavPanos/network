@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            @include('profile.profile', ['user' => auth()->user()])
            <div class="col-md-8">
                @include('repositories.index', ['user' => auth()->user()])
                @include('projects.projects', ['user'=>auth()->user()])
                @include('posts.posts', ['user' => auth()->user()])
            </div>
        </div>
    </div>
@endsection
