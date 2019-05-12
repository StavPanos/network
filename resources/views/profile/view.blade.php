@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            @include('profile.profile', ['user' => $user])
            <div class="col-md-6">
                @include('repositories.index', ['user' => $user])
                @include('projects.projects', ['user'=>$user])
                @include('posts.posts', ['user'=>$user])
            </div>
            @include('friends.friendship', ['user'=>$user])
        </div>
    </div>
@endsection
