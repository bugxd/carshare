@extends('layouts.app')


<div class="col-lg-offset-4 col-lg-4">
    <div class="container">
        <h3>Upload Profilbild</h3>
        <form action="storeUserPic" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="file" name="image" >
            <br>
            <input type="submit" value="Upload">

        </form>

    </div>


</div>