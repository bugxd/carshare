@extends('layouts.app')

@section('script')
    $(document).ready(function() {
        $( function() {
            $( "#car-available-from" ).datepicker(
                {dateFormat:'yy-mm-dd'}
            );
        } );
        $( function() {
            $( "#car-available-to" ).datepicker(
                {dateFormat:'yy-mm-dd'}
            );
        } );
    });
@endsection

@section('style')
    #map{
        height: 300px;
        with: auto;
    }
@endsection

@section('callback_script')
    <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 46.6247222, lng: 14.3052778},
                zoom: 16
            });
            var infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(pos);

                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        draggable: true,
                        title: 'Aktuelle Position'
                    });
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                    marker.addListener('drag', function() {

                        document.getElementById('lat').setAttribute('value',marker.getPosition().lat());
                        document.getElementById('lng').setAttribute('value',marker.getPosition().lng());
                    });

                    //set initial position to labels
                    document.getElementById('lat').setAttribute('value',marker.getPosition().lat());
                    document.getElementById('lng').setAttribute('value',marker.getPosition().lng());
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter(),map);
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter(),map);
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos, map) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');


            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: true,
                title: 'Aktuelle Position'
            });
        }
    </script>
@endsection

@section('content')
    <form method="post" action="{{ route('cars.store') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Marke</label>
                <input type="text" class="form-control" id="car-brand" name="brand" placeholder="Marke" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Typ</label>
                <input type="text" class="form-control" id="car-car_type" name="car_type" placeholder="Typ" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="validationDefault04">Kennzeichen</label>
                <input type="text" class="form-control" id="car-licence_plate" name="licence_plate" placeholder="Kennzeichen" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault03">Farbe</label>
                <input type="text" class="form-control" id="car-color" name="color" placeholder="Farbe" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault05">Anzahl der Sitzplätze</label>
                <input type="number" class="form-control" id="car-nr_of_seats" name="nr_of_seats" placeholder="Sitzplätze" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Eigengewicht</label>
                <input type="number" class="form-control" id="car-weight" name="weight" placeholder="Eigengewicht" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Hubraum</label>
                <input type="number" class="form-control" id="car-capacity" name="capacity" placeholder="Hubraum" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Leistung</label>
                <input type="number" class="form-control" id="car-power" name="power" placeholder="Leistung" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Bauartgeschwindigkeit</label>
                <input type="number" class="form-control" id="car-design_speed" name="design_speed" placeholder="Bauartgeschwindigkeit" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Nutzlast</label>
                <input type="number" class="form-control" id="car-payload" name="payload" placeholder="Nutzlast" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Sattellast</label>
                <input type="number" class="form-control" id="car-vertical_load" name="vertical_load" placeholder="Sattellast" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Achslasten</label>
                <input type="number" class="form-control" id="car-axe_load" name="axe_load" placeholder="Achslasten" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="car-animal_allowed" name="animal_allowed" > Tiere erlaubt
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="car-smoking_allowed" name="smoking_allowed" > Rauchen erlaubt
                    </label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="validationDefault03">Beschreibung/Austattung</label>
                <input type="text" class="form-control" id="car-description" name="description" placeholder="Beschreibung oder Austattung" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="validationAvailableFrom">Verfügbar von</label>
                <input type="text" class="form-control" id="car-available-from" name="available_from" placeholder="Y-m-d" required>
            </div>
            <div class="col-md-3">
                <label for="validationAvailableTo">Verfügbar bis</label>
                <input type="text" class="form-control" id="car-available-to" name="available_to" placeholder="Y-m-d" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">Preis (pro Tag)</label>
                <input type="text" class="form-control" id="car-price" name="price" placeholder="Preis" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <label>Position des Autos</label>
                <div id="map"></div>
            </div>
        </div>
        <div id="row">
            <div id="col-md-3">
                <input id="lat" name="lat" type="hidden"  pattern="[0-9]+([\.][0-9]+)?" step="any"/>
            </div>
            <div id="col-md-3">
                <input id="lng" name="lng" type="hidden"  pattern="[0-9]+([\.][0-9]+)?" step="any"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit" value="submit">Änderungen speichern</button>
            </div>
        </div>
    </form>
@endsection