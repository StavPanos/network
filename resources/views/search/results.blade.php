@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Results
                    </div>

                    <div class="card-body">
                        <h5>Users</h5>
                        <ul class="list-group">
                            @forelse($users as $user)
                                <li class="list-group-item">
                                    @include('components.avatar', ['user'=>$user])
                                    <a href="/profile/{{$user->id}}">
                                        {{$user->name}}
                                    </a>
                                </li>
                            @empty
                                No Results
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
