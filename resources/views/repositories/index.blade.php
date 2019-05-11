<div class="card height-scroll">
    <div class="card-header">
        <img src="{{asset('images/github.png')}}" alt="">
        Repositories
    </div>

    <div class="card-body">
        @if($user->provider == 'github')
            @forelse($repositories as $repo)
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <a target="_blank" href="{{$repo->html_url}}">{{$repo->name}}</a>
                        </h5>
                    </div>

                    <div class="card-body">
                        <span class="font-weight-bold">{{$repo->description}}</span>

                        <hr>

                        last update:
                        <span class="lead">
                        {{ \Carbon\Carbon::parse($repo->updated_at)->diffForHumans() }}
                    </span>
                    </div>
                </div>
                <br>
            @empty
                No repositories
            @endforelse
        @endif

        @if($user->provider == 'bitbucket')
            @forelse($repositories->values as $repo)
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <a target="_blank" href="{{$repo->links->self->href}}">{{$repo->name}}</a>
                        </h5>
                    </div>

                    <div class="card-body">
                        <span class="font-weight-bold">{{$repo->description}}</span>

                        <hr>

                        last update:
                        <span class="lead">
                        {{ \Carbon\Carbon::parse($repo->updated_on)->diffForHumans() }}
                    </span>
                    </div>
                </div>
                <br>
            @empty
                No repositories
            @endforelse
        @endif
    </div>

</div>
