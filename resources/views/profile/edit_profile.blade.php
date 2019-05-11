<a data-toggle="modal" data-target="#exampleModal" class="ml-3">
    <i class="fa fa-edit" style="vertical-align: middle;"></i>
</a>

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
                        <label for="name">Profile image</label>
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile"
                               aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                            image should
                            not be more than 2MB.
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Change image</button>
                </form>

                <br>
                <hr>

                <form action="profile/edit" method="post">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">

                    <br>

                    <label for="country">Country</label>
                    <select name="country_id" class="form-control">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"
                                    @if(isset($user->country))
                                        @if($country->id==$user->country->id)
                                        selected
                                        @endif
                                    @endif
                            >{{$country->name}}</option>
                        @endforeach
                    </select>

                    <br>

                    <label for="name">Bio</label>
                    <textarea name="bio" value="{{$user->bio}}" class="form-control"></textarea>

                    <br>

                    <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>