@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('auth.register-member')

                <br>

{{--                @include('auth.register-employer')--}}
            </div>
        </div>
    </div>

{{--    @section('scripts')--}}
{{--        {!! NoCaptcha::renderJs() !!}--}}
{{--    @endsection--}}
@endsection
