@extends('layouts.app')

@section('script')
    $('body').scrollspy({ target: '#navbar-example' })

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
                center: {lat: -34.397, lng: 150.644},
                zoom: 16
            });
            var infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: {{ $car->lat }},
                        lng: {{ $car->lng }}
                    };

                    map.setCenter(pos);

                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        draggable: true,
                        title: 'Auto Position'
                    });
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }
    </script>
@endsection


@section('content')
    <div class="row">
        <form class="col-md-8 col-md-offset-2">
            <div class="card">
                <img class="card-img-top" src="/carshare/public/img/car1.jpg" alt="Card image car1">
                <div class="card-body">
                    <h4 class="card-title">{{ $car->brand }} {{$car->car_type}}</h4>
                    <p class="card-text">{{ $car->description }}</p>
                </div>
            </div>
            <form id="navbar-example">
                <div id="list-example" class="list-group">
                    <a class="list-group-item list-group-item-action" href="#list-item-1">Car Data</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-2">Location</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-3">Price</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-4">Rent</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-5">Contact</a>
                </div>
                <form data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                    <h4 id="list-item-1">CarData</h4>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            Kennzeichen {{ $car->licence_plate }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            Farbe {{ $car->color }}
                        </div>
                        <div class="col-md-4 mb-3">
                            Anzahl der Sitzplätze {{ $car->nr_of_seats }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            Eigengewicht {{ $car->weight }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Hubraum {{ $car->capacity }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Leistung {{ $car->power }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Bauartgeschwindigkeit {{ $car->design_speed }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            Nutzlast {{ $car->payload }}
                        </div>
                        <div class="col-md-3 mb-3">
                            Sattellast {{ $car->vertical_load }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Achslasten {{ $car->axe_load }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-check-input" type="checkbox" id="animal_allowed" value="{{ $car->animal_allowed }}" disabled> Tiere erlaubt
                        </div>
                        <div class="col-md-6">
                            <input class="form-check-input" type="checkbox" id="smoking_allowed" value="{{ $car->smoking_allowed }}" disabled> Rauchen erlaubt
                        </div>

                    </div>

                    <h4 id="list-item-2">Location</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <label>Position des Autos</label>
                            <div id="map"></div>
                        </div>
                    </div>

                    <h4 id="list-item-3">Price</h4>

                    {{ $car->price }}

                    <h4 id="list-item-4">Rent</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
                    <h4 id="list-item-5">Contact</h4>
                    <p><a href="{{ route('writeMessage', ['carUser_id'=>$car->user_id]) }}">Contact me</a></p>
                </form>
            </form>
        </div>
    </div>
@endsection