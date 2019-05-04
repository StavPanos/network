<div class="card">
    <div class="card-header">
        <h2>
            REPOSITORIES
        </h2>
    </div>
    <div class="card-body repos">

        @foreach($repositories as $repo)
            <div class="card">
                <div class="card-header">
                    <h5>
                        {{$repo->name}}
                    </h5>
                </div>

                <div class="card-body">
                    <p>{{$repo->description}}</p>
                    <p>
                        last update at {{$repo->updated_at->diffForHumans()}}</p>
                </div>
            </div>
            <br>
        @endforeach
    </div>

</div>
