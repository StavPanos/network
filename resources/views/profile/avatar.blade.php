@if($user->avatar)
    @if($user->custom_avatar)
        <img src="/storage/avatars/{{$user->avatar}}">
    @else
        <img src="{{$user->avatar}}">
    @endif
@else
    <img src="{{asset('images/no-image.png')}}" alt="" class="w-25">
@endif
