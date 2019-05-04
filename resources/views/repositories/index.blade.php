<div class="card">
    <div class="card-header">
        <h2>
            REPOSITORIES
        </h2>
    </div>

{{--    {{$repositories}}--}}

    @foreach($repositories as $repo)
        <div class="card-body">

            <hr>

            <h3>{{$repo->name}}</h3>
            <p>{{$repo->description}}</p>
            <p>{{$repo->updated_at}}</p>

        </div>
    @endforeach
</div>
