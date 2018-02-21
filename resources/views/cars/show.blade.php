@extends('layouts.app')

@section('script')
    $('document').ready(function(){
        $('body').scrollspy({ target: '#navbar-example' })
        $('.carousel').carousel()
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
        <form class="col-md-12 col-md-offset-2">
            <div id="carouselExampleControls" class="carousel slide card-img-top" data-ride="carousel" style="height:220px; width: 300px;">
                <div class="carousel-inner" style="height:220px; width: 300px;">
                    @foreach($pictures as $picture)
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img class="d-block w-100 rounded" src="{{ asset('storage/carIMG/'.$picture->imgName) }}"  alt="{{ $picture->imgName }}" style="height: 220px; width: 420px;">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="{{ asset('storage/carIMG/'.$picture->imgName) }}" alt="{{ $picture->imgName }}" style="height: 220px; width: 420px;">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><br>
            <div class="card-body">
                <h4 class="card-title">{{ $car->brand }} {{$car->car_type}}</h4>
                <p class="card-text">{{ $car->description }}</p>
            </div>
            <form id="navbar-example">
                <div id="list-example" class="list-group">
                    <a class="list-group-item list-group-item-action" href="#list-item-1">Car Data</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-2">Location</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-3">Price</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-4">Rent</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-5">Contact</a>
                </div>
                <br><br>
                <form data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                    <div class="container">
                    <h4 id="list-item-1">CarData</h4>
					<br>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            Kennzeichen: {{ $car->licence_plate }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            Farbe: {{ $car->color }}
                        </div>
                        <div class="col-md-3 mb-3">
                            Anzahl der Sitzplätze: {{ $car->nr_of_seats }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Leistung: {{ $car->power }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            Eigengewicht: {{ $car->weight }}
                        </div>
                        <div class="col-md-3 mb-3">
                            Hubraum: {{ $car->capacity }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Bauartgeschwindigkeit: {{ $car->design_speed }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            Nutzlast: {{ $car->payload }}
                        </div>
                        <div class="col-md-3 mb-3">
                            Sattellast: {{ $car->vertical_load }}
                        </div>
                        <div class="col-md-2 mb-3">
                            Achslasten: {{ $car->axe_load }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="extras1">
                        <div class="col-md-4 mb-2">
                            <input class="form-check-input" type="checkbox" id="animal_allowed" value="{{ $car->animal_allowed }}" disabled> Tiere erlaubt
                        </div>
                        </div>
                        <div class="row"
                        <div class="extras1">
                        <div class="col-md-4 mb-2">
                            <input class="form-check-input" type="checkbox" id="smoking_allowed" value="{{ $car->smoking_allowed }}" disabled> Rauchen erlaubt
                        </div>
                        </div>
                    </div>
                    </div>

                    </div>
                    <div class="container">
					<br>
                    <h4 id="list-item-2">Location</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <label>Position des Autos</label>
                            <div id="map"></div>
                        </div>
                    </div>

					<p><br>
                    <h4 id="list-item-3">Price</h4>

                        <p>{{ $car->price }},- € pro Tag</p>

                    <h4 id="list-item-4">Bewertung</h4>

                    @foreach ($feedback as $feedback)
                    <p><strong>User ID_{{ $feedback->user_id }} schrieb: </strong> {{ $feedback->feedback }} </p>
                    @endforeach

					<p><br>
                    <h4 id="list-item-5">Contact</h4>
                    <p><a href="{{ route('writeMessage', ['carUser_id'=>$car->user_id]) }}">Contact me</a></p><br>
                </form>

                <form method="post" action="{{ route('reservations.store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="car-id" name="car_id" value="{{ $car->id }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="validationAvailableFrom">Reservieren von</label>
                            <input type="text" class="form-control" id="car-available-from" name="rent_from" placeholder="Y-m-d" required>
                        </div>
                        <div class="col-md-3">
                            <label for="validationAvailableTo">Reservieren bis</label>
                            <input type="text" class="form-control" id="car-available-to" name="rent_to" placeholder="Y-m-d" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><br>
                            <button class="btn btn-primary" type="submit" value="submit">Reservieren</button>
                        </div>
                    </div><br><br><br><br><br><br>
                </form>
                    </div>
            </form>
        </div>
    </div>
@endsection