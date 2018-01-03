@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Laden Sie ihre Bilder hoch!</h1> <br>
            {!! Form::open([ 'route' => [ 'dropzone.store' ],
            'files' => true, 'enctype' => 'multipart/form-data', 'class' =>
            'dropzone', 'id' => 'image-upload' ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection