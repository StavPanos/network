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
                <div class="card">
                    <div class="card-header">Requests</div>
                    <div class="card-body repos">
                        <ul class="list-group">
                            @foreach($requests as $request)
                                <li class="list-group-item">
                                    <form method="post" action="friend/accept">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$request->sender->id}}">
                                        <button class="btn btn-success w-100" type="submit">Accept</button>
                                    </form>

                                    <form method="post" action="friend/decline">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$request->sender->id}}">
                                        <button class="btn btn-success w-100" type="submit">Decline</button>
                                    </form>

                                    <a href="profile/{{$request->id}}">
                                        {{$request->sender->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
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
