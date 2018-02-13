@extends('layouts.app')

@section('script')

@endsection

@section('style')
    #map{
        height: 500px;
        withd: auto;
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
                zoom: 14
            });
            var infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Aktuelle Position');
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }

            @foreach($cars as $car)
                var contentString=
                    ' <div class="card" style="width: 20rem;">' +
                    '    <img style="width: 300px; height: 220px;" class="card-img-top" ' +
                    '         src="@foreach ($car->pictures as $picture)@if ($loop->first) {{ asset('storage/carIMG/'.$picture->imgName) }} @endif @endforeach" alt="Card image car{{ $car->id }}">' +
                    '    <div class="card-body">' +
                    '      <h4 class="card-title">{{ $car->brand }} {{ $car->car_type }}</h4>' +
                    '      <ul class="list-group">' +
                    '        <li class="list-group-item justify-content-between">' +
                    '          Verfügbar von: <span class="badge badge-secondary">{{ $car->available_from }}</span> bis: <span class="badge badge-secondary">{{ $car->available_to }}</span>' +
                    '        </li>' +
                    '        <li class="list-group-item justify-content-between">' +
                    '           Preis: <span class="badge badge-secondary">{{ $car->price }}€</span> pro Tag' +
                    '        </li>' +
                    '      </ul>' +
                    '      <a href="cars/{{ $car->id }}" class="btn btn-primary">Details</a>' +
                    '    </div>' +
                    '  </div> ';

                var infowindow{{ $car->id }} = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker{{ $car->id }} = new google.maps.Marker({
                    position: {lat: {{ $car->lat }}, lng: {{ $car->lng }} },
                    map: map,
                    title: 'a Position'
                });

                marker{{ $car->id }}.addListener('click', function() {
                    infowindow{{ $car->id }}.open(map, marker{{ $car->id }});
                });
            @endforeach

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
    <div id="row">
        <h1 class="h1">Autos in der Nähe</h1>
    </div>
    <div id="row">
        <div id="map"></div>
    </div><br>

    @foreach($cars as $car)
        <div class="row">
            <div class="container" >
            <div class="card">
                <div class="row">
                    <div class="col-md-4">
                        <img style="width: 300px; height: 230px;" class="card-img-top rounded" src="@foreach ($car->pictures as $picture)@if ($loop->first) {{ asset('storage/carIMG/'.$picture->imgName) }} @break @endif @endforeach" alt="Card image car{{ $car->id }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $car->brand }} {{ $car->car_type }}</h4>
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between">
                                    Verfügbar von <span class="badge badge-secondary">{{ $car->available_from }}</span> bis <span class="badge badge-secondary">{{ $car->available_to }}</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Preis <span class="badge badge-secondary">{{ $car->price }}€</span> pro Tag
                                </li>
                                <li class="list-group-item justify-content-between">
                                    <a class="btn btn-primary" href="cars/{{ $car->id }}" value="Details">Details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach

<br><br><br><br><br>

@endsection