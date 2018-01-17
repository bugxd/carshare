@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="storage/userIMG/{{ $user->avatar }}" style="float:left; border-radius: 50%; margin-right: 25px; width: 150px; height: 150px" class="rounded-circle" />
            <a style="float: right" href="{{ url('/profile') }}" >Bearbeiten</a>
            <h3>Hallo, {{ $user->first_name }} {{ $user->last_name }}</h3>
        </div>
    </div>
    <br><h3>Deine Autos</h3>
    <a href="cars/create" class="btn btn-primary"><span class="badge badge-secondary">+</span>Neues Auto Anlege</a>
</div>

@endsection

