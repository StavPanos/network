<div class="card height-scroll">
    <div class="card-header">
        Repositories
    </div>
    <div class="card-body">
        @foreach($repositories as $repo)
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
        @endforeach
    </div>

</div>
