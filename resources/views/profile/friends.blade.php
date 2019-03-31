@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @foreach($friends as $friend)
                        <a href="profile/{{$friend->id}}">{{$friend->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
