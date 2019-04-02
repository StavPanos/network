<ul class="list-group" style="height: 300px;overflow-y: scroll;">
    @foreach($users as $user)
        <li class="list-group-item">
            @if($user->avatar)
                <img src="{{$user->avatar}}" width="50">
            @else
                <img src="{{asset('images/no-image.png')}}" alt="" width="50">
            @endif
            &nbsp;
            <a href="/profile/{{$user->id}}">
                <a href="profile/{{$user->id}}">{{$user->name}}</a>
            </a>
        </li>
    @endforeach
</ul>
