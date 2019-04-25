@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('components.profile', ['user' => $user])
            <div class="col-md-6">
                @include('projects.projects', ['user'=>$user])
                <br>
                @include('posts.posts', ['user'=>$user])
            </div>
            @include('friends.friendship', ['user'=>$user])
        </div>
    </div>
@endsection
