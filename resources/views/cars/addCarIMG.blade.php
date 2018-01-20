@extends('layouts.app')


@section('content')
    <div class="row">
        <h1 class="h1">
            Lade Bilder von deinem Auto hoch
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST"
                  action="{{ route('dropzone.store',[$car->id]) }}"
                  accept-charset="UTF-8" enctype="multipart/form-data"
                  class="dropzone dz-clickable" id="image-upload">
                {{ csrf_field() }}
                <div class="dz-default dz-message">
                    <span>Ziehe deine Bilder in die Box</span>
                </div>
            </form>
        </div>

    </div>

    <div class="row">
        <a href="{{ route('cars.show',['car'=>$car]) }}" class="btn btn-primary">Fertig</a>

    </div>
@endsection