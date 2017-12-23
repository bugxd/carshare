@extends('layouts.app')

@section('script')

@endsection

@section('style')

@endsection


@section('content')
<form>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Marke</label>
            <input type="text" class="form-control" id="brand" placeholder="Marke" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Typ</label>
            <input type="text" class="form-control" id="car_type" placeholder="Typ" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="validationDefault04">Kennzeichen</label>
            <input type="text" class="form-control" id="licence_plate" placeholder="Kennzeichen" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="validationDefault03">Farbe</label>
            <input type="text" class="form-control" id="color" placeholder="Farbe" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault05">Anzahl der Sitzplätze</label>
            <input type="number" class="form-control" id="nr_of_seats" placeholder="Sitzplätze" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="validationDefault03">Eigengewicht</label>
            <input type="number" class="form-control" id="weight" placeholder="Farbe" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="validationDefault03">Hubraum</label>
            <input type="number" class="form-control" id="capacity" placeholder="Eigengewicht" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="validationDefault03">Leistung</label>
            <input type="number" class="form-control" id="power" placeholder="Leistung" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="validationDefault03">Bauartgeschwindigkeit</label>
            <input type="number" class="form-control" id="power" placeholder="Bauartgeschwindigkeit" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="validationDefault03">Nutzlast</label>
            <input type="number" class="form-control" id="payload" placeholder="Nutzlast" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="validationDefault03">Sattellast</label>
            <input type="number" class="form-control" id="vertical_load" placeholder="Sattellast" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="validationDefault03">Achslasten</label>
            <input type="number" class="form-control" id="axe_load" placeholder="Achslasten" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="animal_allowed" value="option1"> Tiere erlaubt
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="smoking_allowed" value="option2"> Rauchen erlaubt
                </label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="validationDefault03">Weitere Beschreibung/Austattung</label>
            <input type="number" class="form-control" id="description" placeholder="Beschreibung oder Austattung" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            INSERT MAP HERE
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Submit form</button>
</form>
@endsection