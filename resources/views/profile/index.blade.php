@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <img src="{{auth()->user()->avatar}}">
                    <p>Name: {{auth()->user()->name}}</p>
                    <p>Email: {{auth()->user()->email}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            @include('components.posts')
        </div>
    </div>
</div>
@endsection
