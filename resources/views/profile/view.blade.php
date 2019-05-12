@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @include('friends.friendship', ['user'=>$user])
        </div>
        <div class="row">
            @include('profile.profile', ['user' => $user])
            <div class="col-md-6">
                @include('repositories.index', ['user' => $user])
                @include('projects.projects', ['user'=>$user])
                @include('posts.posts', ['user'=>$user])
            </div>
        </div>
    </div>
@endsection
