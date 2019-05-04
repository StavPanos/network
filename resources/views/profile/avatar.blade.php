@if($user->avatar)
    @if($user->custom_avatar)
        <img src="/storage/avatars/{{$user->avatar}}" class="w-25">
    @else
        <img src="{{$user->avatar}}" class="w-25">
    @endif
@else
    <img src="{{asset('images/no-image.png')}}" alt="" class="w-25">
@endif
