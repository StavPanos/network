<div class="card">
    <div class="card-header">
        <h2>
            REPOSITORIES
        </h2>
    </div>

{{--    {{$repositories}}--}}


        <div class="card-body">

            <hr>
            @foreach($repositories as $repo)

            <h3>{{$repo->name}}</h3>
            <p>{{$repo->description}}</p>
            <p>{{$repo->updated_at}}</p>
@endforeach
        </div>

</div>
