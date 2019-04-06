<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            @include('components.avatar', ['user'=>$user])
        </div>

        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <i class="fa fa-user"></i>
                    {{$user->name}}
                </li>
                <li class="list-group-item">
                    <i class="fa fa-envelope"></i>
                    {{$user->email}}
                </li>
                <li class="list-group-item">
                    <i class="fa fa-info"></i>
                    {{$user->bio}}
                </li>
                <li class="list-group-item">
                    @if(isset($user->country))
                        <img src="https://www.countryflags.io/{{$user->country->code}}/flat/64.png">
                        {{$user->country->name}}
                    @endif
                </li>
                <li class="list-group-item">
                    Programming Language: {{$user->programming_language}}
                </li>
            </ul>
        </div>
    </div>
</div>
