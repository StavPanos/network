<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            @if($user->avatar)
                <img src="{{$user->avatar}}" class="w-100">
            @else
                <img src="{{asset('images/no-image.png')}}" alt="" class="w-100">
            @endif
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
                    <img src="https://www.countryflags.io/{{$user->country->code}}/flat/64.png">
                    {{$user->country->name}}
                </li>
                <li class="list-group-item">
                    Programming Language: {{$user->programming_language}}
                </li>
            </ul>
        </div>
    </div>
</div>
