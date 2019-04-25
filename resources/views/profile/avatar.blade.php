@if($user->avatar)
    <img src="/storage/avatars/{{$user->avatar}}" class="w-25">
@else
    <img src="{{asset('images/no-image.png')}}" alt="" class="w-25">
@endif
