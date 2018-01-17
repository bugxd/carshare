@extends('layouts.app')

@section('content')

   <h1>Nachrichten</h1>
   @if(count($messages) >0) 
   		@foreach($messages as $message)
   			<div class="card card-body bg-light">
   				@if($message->gelesen ==1)
   	   				<b><p>Betreff: {{$message->betreff}}</p>
   	   				<p>{{$message->inhalt}}</p></b>
   	   			@else
   	   				<p>Betreff: {{$message->betreff}}</p>
   	   				<p>{{$message->inhalt}}</p>
   	   			@endif
   				<small>erzeugt am {{$message->created_at}}</small>
   			</div>
   		@endforeach
   		{{ $messages->links() }}
   @else
   		<p>Keine Nachrichten gefunden </p>
   @endif

@endsection