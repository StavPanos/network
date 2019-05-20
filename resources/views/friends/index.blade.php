@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Connections</div>
                    <div class="card-body repos">
                        @include('friends.userlist', ['users' => $friends])
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card height-scroll">
                    <div class="card-header">Requests</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($requests as $request)
                                @if($request->sender->id != auth()->user()->id)
                                <li class="list-group-item">
                                    <a href="profile/{{$request->id}}">
                                        {{$request->sender->name}}
                                    </a>
                                    <form method="post" action="friend/accept" class="d-inline">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$request->sender->id}}">
                                        <button class="btn btn-primary btn-outline-primary d-inline-block" type="submit">Accept</button>
                                    </form>

                                    <form method="post" action="friend/decline" class="d-inline">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$request->sender->id}}">
                                        <button class="btn btn-danger btn-outline-danger d-inline-block" type="submit">Decline</button>
                                    </form>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card height-scroll">
                    <div class="card-header">
                        Recommendations
                    </div>

                    <div class="card-body">
                        @include('friends.userlist', ['users'=>$recommended])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
