<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#projectsModal">
    <i class="fa fa-plus text-black"></i>
</button>

<!-- Modal -->
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
                    <input type="text" name="title">

                    <label for="description">Description</label>
                    <textarea name="description" id=""></textarea>

                    <label for="repository">Repository URL</label>
                    <input type="text" name="repository">

                    <button class="btn btn-info" type="submit">Add Project</button>
                </form>
            </div>
        </div>
    </div>
</div>