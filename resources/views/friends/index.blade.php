@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Friends</div>

                <div class="card-body">
                    @foreach(auth()->user()->getAllFriendships() as $friend)
                        <a href="profile/{{$friend->id}}">{{$friend->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Also from {{auth()->user()->country}}
                    and uses {{auth()->user()->programming_language}}
                </div>

                <div class="card-body">
                    <ul class="list-group" style="height: 300px;overflow-y: scroll;">
                        @foreach($recommended as $recommendation)
                        <li class="list-group-item">
                            <a href="/profile/{{$recommendation->id}}">
                                @if($recommendation->avatar)
                                    <img src="{{$recommendation->avatar}}" width="50">
                                @else
                                    <img src="{{asset('images/no-image.png')}}" alt="" width="50">
                                @endif
                                {{$recommendation->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
