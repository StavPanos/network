<div class="col-md-4">
    <div class="card height-scroll">
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
                    <i class="fa fa-user" style="width: 30px"></i>
                    <span class="ml-3">{{$user->name}}</span>
                </li>

                <li class="list-group-item">
                    <i class="fa fa-envelope" style="width: 30px"></i>
                    <span class="ml-3">{{$user->email}}</span>
                </li>

                @if($user->bio)
                    <li class="list-group-item">
                        <i class="fa fa-info" style="width: 30px"></i>
                        <span class="ml-3">{{$user->bio}}</span>
                    </li>
                @endif

                @if($user->country)
                    <li class="list-group-item">
                        @if(isset($user->country))
                            <img style="width: 30px" src="https://www.countryflags.io/{{$user->country->code}}/shiny/64.png">
                            <span class="ml-3">{{$user->country->name}}</span>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="card height-scroll mt-3">
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
                    <hr>

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
