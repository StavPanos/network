<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Or login with</label>
</div>

<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check p-0">
            <a href="{{ url('/auth/github') }}" class="btn btn-outline-dark waves-effect btn-block">
                <i class="fa fa-github"></i> Github
            </a>

            <a href="{{ url('/auth/bitbucket') }}" class="btn btn-outline-info waves-effect btn-block mt-3">
                <i class="fa fa-bitbucket"></i> Bitbucket
            </a>
        </div>
    </div>
</div>