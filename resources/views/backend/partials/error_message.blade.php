@if (Session::has('old_password'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {!! Session::get('old_password') !!}
            </div>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul class="pb-0 mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="pb-0 mb-0">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif