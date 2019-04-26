<div class="card">
    <div class="card-header">
        <h2>
            PROJECTS

            @if(auth()->check())
                @if(auth()->user()->id == $user->id)
                    @include('projects.add_project')
                @endif
            @endif
        </h2>
    </div>

    @if($errors->any())
        <div id="error-box">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    @foreach($user->projects as $project)
        <div class="card-body">
            {{$project->created_at->diffForHumans()}}

            @if(auth()->check())
                @if(auth()->user()->id == $user->id)
                    <form action="/project/delete" method="post" class="d-inline">
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <button type="submit" class="ml-3 btn btn-link">
                            <i class="fa fa-trash text-black"></i>
                        </button>
                    </form>
                @endif
            @endif

            <hr>

            <h3>{{$project->title}}</h3>
            <p>{{$project->description}}</p>
            <p>{{$project->repository}}</p>

        </div>
    @endforeach
</div>
