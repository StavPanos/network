<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Social Network for Developers
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ml-3">
                            <a class="nav-link btn btn-info" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        @include('components.search')
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            @foreach(auth()->user()->notifications as $notification)
                                <a class="dropdown-item" href="/home">
                                    {{$request->name}}
                                    <form method="post" action="friend/accept">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$request->id}}">
                                        <button type="submit">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>

                                    <form method="post" action="friend/decline">
                                        {{csrf_field()}}
                                        <button type="submit">
                                            <i class="fa fa-window-close"></i>
                                        </button>
                                    </form>
                                </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown2" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="/friends">Friends</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
