@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="storage/userIMG/{{ Auth::user()->avatar }}" style="float:left; border-radius: 50%; margin-right: 25px; width: 150px; height: 150px" class="rounded-circle" />
            <a style="float: right" href="{{ url('/profileEdit') }}" >Bearbeiten</a>
            <h3>Hallo, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h3>Deine Reservierungen</h3>
        </div>
    </div>
    @foreach($reservations as $rent)
        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top" src="@foreach ($rent->car->pictures as $picture)@if ($loop->first) {{ asset('storage/carIMG/'.$picture->imgName) }} @break @endif @endforeach" alt="Card image car{{ $rent->car_id }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $rent->car->brand }} {{ $rent->car->car_type }}</h4>
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between">
                                    Reserviert von <span class="badge badge-secondary">{{ $rent->rent_from }}</span> bis <span class="badge badge-secondary">{{ $rent->rent_to }}</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Preis <span class="badge badge-secondary">{{ $rent->car->price }}€</span> pro Tag
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-3">
            <h3>Deine Autos</h3>
        </div>
        <div class="col-md-6">
            <a href="cars/create" class="btn btn-primary"><span class="badge badge-secondary">+</span>Neues Auto Anlege</a>
        </div>

    </div>
    @foreach($cars as $car)
        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top" src="@foreach ($car->pictures as $picture)@if ($loop->first) {{ asset('storage/carIMG/'.$picture->imgName) }} @break @endif @endforeach" alt="Card image car{{ $car->id }}">
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
                            </ul>

                            <a href="cars/{{ $car->id }}/edit" class="btn btn-primary">Bearbeiten</a>

                            <button
                                    class="btn btn-danger"
                                    onclick="
                                var result = confirm('Willst du das Auto wirklich löschen?');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                                }"
                            >Löschen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- here for a delete test -->
        <form id="delete-form" method="POST" style="display:none;" action="{{ route('cars.destroy',[$car->id]) }}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
        </form>
    @endforeach

</div>

@endsection

