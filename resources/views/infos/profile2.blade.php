@extends('layouts.app')

@section('content')
<div class="container">
    <a style="float: right" href="{{ url('/profile') }}" >Bearbeiten</a>
    <h3>Hallo, {{ $user->first_name }} {{ $user->last_name }}</h3>
    <img src="{{asset('storage/userIMG/TviOUThDA8YU5aKerlagffulqJx8VTZX3Jrm7OtI.jpeg')}}" style="width: 150px; height: 150px" class="rounded-circle" />

    <br><h3>Deine Autos</h3>


</div>

@endsection