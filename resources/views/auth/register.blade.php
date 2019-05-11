@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                @include('auth.register-member')
            </div>
        </div>
    </div>
@endsection
