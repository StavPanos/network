<div class="card">
    <div class="card-header">
        <h2>
            REPOSITORIES
        </h2>
    </div>
    <div class="card-body">

        @foreach($repositories as $repo)
            <div class="card">
                <div class="card-header">
                    <h5>
                        {{$repo->name}}
                    </h5>
                </div>

                <div class="card-body">
                    <hr>

                    <p>{{$repo->description}}</p>
                    <p>{{$repo->updated_at}}</p>
                </div>
            </div>
        @endforeach
    </div>

</div>
