<a data-toggle="modal" data-target="#projectsModal" class="ml-3">
    <i class="fa fa-plus" style="vertical-align: middle;"></i>
</a>

<div class="modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/project/create" method="post">
                    @csrf

                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">

                    <br>

                    <label for="description">Description</label>
                    <textarea name="description" rows="5" id="" class="form-control"></textarea>

                    <br>

                    <label for="repository">Repository URL</label>
                    <input type="text" name="repository" class="form-control">

                    <br>

                    <button class="btn btn-primary btn-outline-primary btn-block" type="submit">Add Project</button>
                </form>
            </div>
        </div>
    </div>
</div>