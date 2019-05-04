<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            @include('profile.avatar', ['user'=>$user])
            @if(auth()->check())
                @if(auth()->user()->id == $user->id)
                    @include('profile.edit_profile')
                @endif
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

                @if($user->bio)
                    <li class="list-group-item">
                        <i class="fa fa-info"></i>
                        {{$user->bio}}
                    </li>
                @endif

                @if($user->country)
                    <li class="list-group-item">
                        @if(isset($user->country))
                            <img src="https://www.countryflags.io/{{$user->country->code}}/shiny/64.png">
                            {{$user->country->name}}
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            Technology
            @if(auth()->check())
                @if(auth()->user()->id == $user->id)
                    @include('profile.edit_planguages')
                @endif
            @endif
        </div>

        <div class="card-body">
            <ul class="list-group">

                <li class="list-group-item">
                    Programming Languages

                    <ul class="list-group">
                        @foreach($user->planguages as $lang)
                            <li class="list-group-item">
                                {{$lang->name}}
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
