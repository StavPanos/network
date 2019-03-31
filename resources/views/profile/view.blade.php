@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>

                    <img src="{{$user->avatar}}">
                </div>

                @if(!auth()->user()->friends->contains('id', $user->id))
                    <div class="card-footer text-muted">
                        <form method="post" action="/connect">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-primary" type="submit">Connect</button>
                        </form>
                    </div>
                @else
                    <div class="card-footer text-muted">
                        <form method="post" action="/disconnect">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-danger" type="submit">Disconnect</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
