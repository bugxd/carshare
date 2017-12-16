<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CarShare About</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 		<link href="{{ asset('css/global2.css') }}" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{!! asset('js/app.min.js') !!}"></script>
	   
    </head>
    
    <body>
    
    	<!-- NAV BAR -->
    	<div  class="navbar">
   			 @include('inc.navbar')
    	</div>
    	<!-- NAV BAR END -->
    	
    	<div>
    	
    	
    	<li class="nav"><a href="{{ route('home') }}">Home</a></li>
    	
    	</div>
    
    
    </body>
 </html>