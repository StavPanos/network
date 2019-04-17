@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('components.profile', ['user' => $user])
            <div class="col-md-6">
                @include('components.projects', ['user'=>$user])
                <br>
                @include('components.posts', ['user'=>$user])
            </div>
            @include('components.friendship', ['user'=>$user])
        </div>
    </div>
@endsection
