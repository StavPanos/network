@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @include('friends.friendship', ['user'=>$user])
        </div>
        <div class="row mt-3">
            @include('profile.profile', ['user' => $user])
            <div class="col-md-8">
                @include('repositories.index', ['user' => $user])
                @include('projects.projects', ['user'=>$user])
                @include('posts.posts', ['user'=>$user])
            </div>
        </div>
    </div>
@endsection
