<div class="card">
    <div class="card-header">
        Repositories
    </div>
    <div class="card-body repos">
        @foreach($repositories as $repo)
            <div class="card">
                <div class="card-header">
                    <h5>
                        <a target="_blank" href="{{$repo->html_url}}">{{$repo->name}}</a>
                    </h5>
                </div>

                <div class="card-body">
                    <p>{{$repo->description}}</p>
                    <p>
                        last update at {{$repo->updated_at}}</p>
                </div>
            </div>
            <br>
        @endforeach
    </div>

</div>
