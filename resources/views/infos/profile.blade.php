@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="storage/userIMG/{{ Auth::user()->avatar }}" alt="useravatar" style="float:left; border-radius: 50%; margin-right: 25px; width: 180px; height: 150px" class="rounded-circle" />
            <a style="float: right" href="{{ url('/profileEdit') }}" >Bearbeiten</a>
            <h3>Hallo, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
        </div>
    </div>
    <br><br>
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
                        <br><br><img style="width: 300px; height: 230px; margin-right: 300px;" class="card-img-top rounded" src="@foreach ($rent->car->pictures as $picture)@if ($loop->first) {{ asset('storage/carIMG/'.$picture->imgName) }} @break @endif @endforeach" alt="Card image car{{ $rent->car_id }}">
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
                                <li class="list-group-item justify-content-between">
                                    <a class="btn btn-primary" href="{{ route('writeFeedback', ['car_id'=>$rent->car->id]) }}" value="Bewerten">Bewerten</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    @endforeach

    <div class="row">
        <div class="col-md-3">
            <h3>Deine Autos</h3>
        </div>
        <div class="col-md-6">
            <a style="margin-left: 0px;" href="cars/create" class="btn btn-primary"><span class="badge badge-secondary">+</span>Neues Auto Anlege</a>
        </div>
    </div><br>

    @foreach($cars as $car)
        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="col-md-4">
                        <br><br><img style="width: 300px; height: 230px; margin-right: 400px;" class="card-img-top rounded" src="@foreach ($car->pictures as $picture)@if ($loop->first) {{ asset('storage/carIMG/'.$picture->imgName) }} @break @endif @endforeach" alt="Card image car{{ $car->id }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $car->brand }} {{ $car->car_type }}</h4>
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between">
                                    Verfügbar von: <span class="badge badge-secondary">{{ $car->available_from }}</span><br> Verfügbar bis: <span class="badge badge-secondary">{{ $car->available_to }}</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Preis pro Tag: <span class="badge badge-secondary">{{ $car->price }}€</span> 
                                </li>
                            </ul>
                            <br>

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
                        </div><br><br>
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

</div><br><br><br><br>

@endsection

