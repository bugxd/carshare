@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="storage/userIMG/{{ Auth::user()->avatar }}" style="float:left; border-radius: 50%; margin-right: 25px; width: 150px; height: 150px" class="rounded-circle" />
            <a style="float: right" href="{{ url('/profileEdit') }}" >Bearbeiten</a>
            <h3>Hallo, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
        </div>
    </div>
    <br><h3>Deine Autos</h3>
    <a href="cars/create" class="btn btn-primary"><span class="badge badge-secondary">+</span>Neues Auto Anlege</a>
    <div class="row">
        <div class="card-group">
            @foreach($cars as $car)
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="img/car1.jpg" alt="Card image car1">
                    <div class="card-body">
                        <h4 class="card-title">{{ $car->brand }} {{ $car->type }}</h4>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between">
                                {{ $car->description }}
                            </li>
                            <li class="list-group-item justify-content-between">
                                {{ $car->price }}
                            </li>
                        </ul>
                        <a href="cars/{{ $car->id }}/edit" class="btn btn-primary">Bearbeiten</a>

                        <button
                                class="btn btn-danger"
                                onclick="
                                    var result = confirm('Willst du das Auto wirklich löschen?');
                                    if(result){
                                        event.preventDefault();
                                        document.getElementById('logout-form').submit();
                                    }"
                        >Löschen</button>
                    </div>
                </div>
                <!-- here for a delete test -->
                <form id="logout-form" method="POST" style="display:none;" action="{{ route('cars.destroy',[$car->id]) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
</div>

@endsection

