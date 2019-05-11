<form class="form-inline md-form form-sm" method="post" action="/search">
    {{csrf_field()}}
    <i class="fa fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm mr-5 ml-3" style="width: 300px;" type="text" placeholder="Search" name="search" aria-label="Search">
</form>