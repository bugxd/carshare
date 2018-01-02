@extends('layouts.app')


@section('content')
<div class="col-lg-offset-4 col-lg-4">
    <div class="container">
        <br>
        <h5>Vorname:</h5>
        <p>{{ $user->first_name }}</p>

        <h5>Nachname:</h5>
        <p>{{ $user->last_name }}</p>

        <h5>Email:</h5>
        <p>{{ $user->email }}</p>

        <h5>Passwort:</h5>
        <p>{{ $user->password }}</p>

        <h5>Upload Profilbild</h5><br>
        <form action="storeUserPic" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="file" name="image" >
            <br><br>
            <input type="submit" value="Upload"><br>
            <br><img src="{{asset('storage/userIMG/TviOUThDA8YU5aKerlagffulqJx8VTZX3Jrm7OtI.jpeg')}}" style="width: 150px; height: 150px" class="rounded-circle" />
        </form>
    </div>
</div>
@endsection