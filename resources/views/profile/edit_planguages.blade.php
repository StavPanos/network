<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#technologyModal">
    <i class="fa fa-edit text-black"></i>
</button>

<!-- Modal -->
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

                    <select name="planguages[]" multiple class="multiple-select">
                        @foreach($planguages as $planguage)
                            <option value="{{$planguage->id}}"
                                    @if(auth()->user()->planguages->contains($planguage))
                                        selected="selected"
                                    @endif>
                                {{$planguage->name}}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-info">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>