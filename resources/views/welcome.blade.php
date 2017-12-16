<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CarShare</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 		<link href="{{ asset('css/global2.css') }}" media="all" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="{!! asset('js/app.min.js') !!}"></script>
		
		<link href="{{ asset('css/global.css') }}" rel="stylesheet" />
	   
    </head>
    
    <body>
        <div class="flex-center position-ref full-height">
        
        <!-- MENU BAR -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#" style="color:red">CarShare</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0"  >
                        <input class="searchField" type="search" placeholder="Search for available cars.." aria-label="Search" >
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav mr-auto"  >
                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-link"><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li class="nav-link"><a href="{{ route('login') }}">Login</a></li>
                                    <li class="nav-link"><a href="{{ route('register') }}">Register</a></li>
                                @endauth
                        @endif
                    </ul>
                </div>
            </nav>
            <!-- MENU BAR END -->




            <div class="content">
                <div class="card-group">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="img/car1.jpg" alt="Card image car1">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Rent</a>
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
            </div>
        </div>
    </body>
</html>
