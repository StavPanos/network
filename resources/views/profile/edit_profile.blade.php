<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/avatar" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile"
                               aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                            image should
                            not be more than 2MB.
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <br><br>

                <form action="profile/edit" method="post">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$user->name}}">

                    <button type="submit" class="btn btn-info">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>