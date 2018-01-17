@extends('layouts.app')

@section('script')

@endsection

@section('style')

@endsection


@section('content')
    <form method="post" action="{{ route('cars.update',[$car->id]) }}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Marke</label>
                <input type="text" class="form-control" id="car-brand" name="brand" placeholder="Marke" value="{{ $car->brand }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Typ</label>
                <input type="text" class="form-control" id="car-car_type" name="car_type" placeholder="Typ" value="{{ $car->car_type }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="validationDefault04">Kennzeichen</label>
                <input type="text" class="form-control" id="car-licence_plate" name="licence_plate" placeholder="Kennzeichen" value="{{ $car->licence_plate }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault03">Farbe</label>
                <input type="text" class="form-control" id="car-color" name="color" placeholder="Farbe" value="{{ $car->color }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault05">Anzahl der Sitzplätze</label>
                <input type="number" class="form-control" id="car-nr_of_seats" name="nr_of_seats" placeholder="Sitzplätze" value="{{ $car->nr_of_seats }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Eigengewicht</label>
                <input type="number" class="form-control" id="car-weight" name="weight" placeholder="Eigengewicht" value="{{ $car->weight }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Hubraum</label>
                <input type="number" class="form-control" id="car-capacity" name="capacity" placeholder="Hubraum" value="{{ $car->capacity }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Leistung</label>
                <input type="number" class="form-control" id="car-power" name="power" placeholder="Leistung" value="{{ $car->power }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Bauartgeschwindigkeit</label>
                <input type="number" class="form-control" id="car-design_speed" name="design_speed" placeholder="Bauartgeschwindigkeit" value="{{ $car->design_speed }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Nutzlast</label>
                <input type="number" class="form-control" id="car-payload" name="payload" placeholder="Nutzlast" value="{{ $car->payload }}" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Sattellast</label>
                <input type="number" class="form-control" id="car-vertical_load" name="vertical_load" placeholder="Sattellast" value="{{ $car->vertical_load }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Achslasten</label>
                <input type="number" class="form-control" id="car-axe_load" name="axe_load" placeholder="Achslasten" value="{{ $car->axe_load }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="car-animal_allowed" name="animal_allowed"  value="{{ $car->animal_allowed }}"> Tiere erlaubt
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="car-smoking_allowed" name="smoking_allowed"  value="{{ $car->smoking_allowed }}"> Rauchen erlaubt
                    </label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="validationDefault03">Beschreibung/Austattung</label>
                <input type="text" class="form-control" id="car-description" name="description" placeholder="Beschreibung oder Austattung" value="{{ $car->description }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="validationDefault03">Preis</label>
                <input type="number" class="form-control" id="car-price" name="price" placeholder="Preis" value="{{ $car->price }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                INSERT MAP HERE
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit" value="submit">Änderungen speichern</button>
            </div>
            <!-- here for a delete test -->
            <div class="col-md-4">
                <button
                    class="btn btn-danger"
                    onclick="
                        var result = confirm('Willst du das Auto wirklich löschen?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        }
                    "
                >Auto löschen</button>

            </div>
            <div class="col-md-4">
                <a class="btn btn-primary" href="{{url('addCarIMG')}}">Bilder Hochladen</a>
            </div>
        </div>
    </form>
    <!-- here for a delete test -->
    <form id="logout-form" method="POST" style="display:none;" action="{{ route('cars.destroy',[$car->id]) }}">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
    </form>
@endsection