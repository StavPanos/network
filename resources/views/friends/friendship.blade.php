@if(auth()->check())
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @if(!auth()->user()->isFriendWith($user))
                    <form method="post" action="/friend/connect" class="d-inline-block">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="btn btn-primary btn-outline-primary d-inline-block" type="submit">
                            <i class="fa fa-plus"></i>
                            Connect
                        </button>
                    </form>
                @else
                    <form method="post" action="/friend/disconnect" class="d-inline-block">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="btn btn-danger btn-outline-danger d-inline-block" type="submit">Disconnect
                        </button>
                    </form>
                @endif

                <form method="post" action="friend/block" class="d-inline-block">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button class="btn btn-danger btn-outline-danger d-inline-block" type="submit">
                        <i class="fa fa-ban"></i>
                        Block
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
