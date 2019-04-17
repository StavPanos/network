@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('components.profile', ['user' => auth()->user()])
            <div class="col-md-8">
                @include('components.projects', ['user'=>auth()->user()])
                <br>
                @include('components.posts', ['user' => auth()->user()])
            </div>
        </div>
    </div>
@endsection
