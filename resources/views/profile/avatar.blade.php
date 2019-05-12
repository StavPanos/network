@if($user->avatar)
    @if($user->custom_avatar)
        <img class="avatar" src="/storage/avatars/{{$user->avatar}}">
    @else
        <img class="avatar" src="{{$user->avatar}}">
    @endif
@else
    <img class="avatar" src="{{asset('images/no-image.png')}}" alt="">
@endif
