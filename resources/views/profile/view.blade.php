@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>

                    <img src="{{$user->avatar}}">
                </div>

                @if(!auth()->user()->isFriendWith($user))
                    <div class="card-footer text-muted">
                        <form method="post" action="friend/connect">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-primary" type="submit">Connect</button>
                        </form>
                    </div>
                @else
                    <div class="card-footer text-muted">
                        <form method="post" action="friend/disconnect">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-danger" type="submit">Disconnect</button>
                        </form>
                    </div>
                @endif

                <div class="card-footer text-muted">
                    <form method="post" action="friend/block">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="btn btn-danger" type="submit">Block</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @include('components.posts', ['posts'=>$user->posts])
        </div>
    </div>
</div>
@endsection
