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
                center: {lat: -34.397, lng: 150.644},
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
                '    <img class="card-img-top" src="img/car1.jpg" alt="Card image car1">' +
                '    <div class="card-body">' +
                '      <h4 class="card-title">{{ $car->brand }} {{ $car->type }}</h4>' +
                '      <ul class="list-group">' +
                '        <li class="list-group-item justify-content-between">' +
                '          {{ $car->description }}' +
                '        </li>' +
                '        <li class="list-group-item justify-content-between">' +
                '          {{ $car->price }}' +
                '        </li>' +
                '      </ul>' +
                '      <a href="cars/{{ $car->id }}" class="btn btn-primary">Rent</a>\n' +
                '    </div>' +
                '  </div> '
                var infowindow{{ $car->id }} = new google.maps.InfoWindow({
                    content: contentString
                });
                var marker{{ $car->id }} = new google.maps.Marker({
                    position: {lat: {{ $car->lat }}, lng: {{ $car->lng }} },
                    map: map,
                    title: 'a Position'
                });
                marker.addListener('click', function() {
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
        <div id="map"></div>
    </div>

@endsection