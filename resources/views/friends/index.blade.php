@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Friends</div>
                <div class="card-body">
                    @foreach($friends as $friend)
                        <a href="profile/{{$friend->id}}">{{$friend->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Requests</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($requests as $request)
                            <li class="list-group-item">
                                <form method="post" action="friend/accept">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$request->id}}">
                                    <button class="btn btn-success w-100" type="submit">Accept</button>
                                </form>
                                {{$request->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Recommendations
                </div>

                <div class="card-body">
                    <ul class="list-group" style="height: 300px;overflow-y: scroll;">
                        @foreach($recommended as $recommendation)
                        <li class="list-group-item">
                            @if($recommendation->avatar)
                                <img src="{{$recommendation->avatar}}" width="50">
                            @else
                                <img src="{{asset('images/no-image.png')}}" alt="" width="50">
                            @endif
                            &nbsp;
                            <a href="/profile/{{$recommendation->id}}">
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
