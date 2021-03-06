<a data-toggle="modal" data-target="#technologyModal" class="ml-3">
    <i class="fa fa-edit" style="vertical-align: middle;"></i>
</a>

<div class="modal fade" id="technologyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit programming languages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="profile/planguages" method="post">
                    @csrf

                    <select name="planguages[]" multiple class="multiple-select form-control">
                        @foreach($planguages as $planguage)
                            <option value="{{$planguage->id}}"
                                    @if(auth()->user()->planguages->contains($planguage))
                                        selected="selected"
                                    @endif>
                                {{$planguage->name}}
                            </option>
                        @endforeach
                    </select>

                    <br>

                    <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>