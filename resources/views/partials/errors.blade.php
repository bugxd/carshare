@if(isset($errors)&&count($errors)>0)
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach($error->all() as $error)
            <strong>
                <li><strong>{!! $error !!}</strong></li>
            </strong>
        @endforeach
    </div>
@endif