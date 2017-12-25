@extends('layouts.app')

@section('content')
<div class="card-group">
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="img/car1.jpg" alt="Card image car1">
        <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{url('car')}}" class="btn btn-primary">Rent</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="img/car2.jpg" alt="Card image car2">
        <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Rent</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="img/car3.jpg" alt="Card image car3">
        <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Rent</a>
        </div>
    </div>
</div>
@endsection