<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CarShare FAQ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 		<link href="{{ asset('css/global2.css') }}" media="all" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="{!! asset('js/app.min.js') !!}"></script>
		
		<link href="{{ asset('css/global.css') }}" rel="stylesheet" />
	   
    </head>
    
    <body>
    	<div class="navbar">
    		@include('inc.navbar')
    	</div>
    	
    	<div class="contentfaq">
    		<h1  class="h1faq" >FAQ</h1>
    		<h3 class="h3faq">Allgemeine Fragen</h3><br>
    		<h4 class="h4faq">Was steckt hinter CarShare?</h4>
    			<span class="span">
    			CarShare ist eine österreichische Webseite und die Idee dahinter ist, dass sowohl Privatpersonen 
    			als auch gewerbetreibende Personen Fahrzeuge für einen gewissen Zeitraum "mieten" können. Das besondere 
    			an CarShare ist das jede Person sein eigenes Auto anbieten kann um somit auch etwas verdienen kann.
    			</span><br><br><br> 
    		<h4 class="h4faq">Wie funktioniert CarShare?</h4>
    			<span class="span">
    				<li> 1. Schritt - Registrieren </li>
    				<li> 2. Schritt - Angebot durchsehen </li>
    				<li> 3. Schritt - Fahrzeug wählen und Verfügbarkeit prüfen </li>
    				<li> 4. Schritt - Fahrzeug buchen / Kontaktperson kontaktieren </li>
    		
    			</span>
           	     
        </div>
    
    
    </body>
 </html>