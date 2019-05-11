<ul class="list-group">
    @foreach($users as $user)
        <li class="list-group-item">
            @include('profile.avatar', ['user' => $user])
            &nbsp;
            <a href="/profile/{{$user->id}}">
                <a href="profile/{{$user->id}}">{{$user->name}}</a>
            </a>
        </li>
    @endforeach
</ul>
