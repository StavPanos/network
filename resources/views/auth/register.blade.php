@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                @include('auth.register-member')
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Info
                    </div>

                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis deserunt, dignissimos
                        eaque eius expedita fugiat harum id labore magnam officiis omnis recusandae saepe totam vitae.
                        In nostrum repudiandae voluptate.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
