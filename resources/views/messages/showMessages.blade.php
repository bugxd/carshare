@extends('layouts.app')

@section('content')

   <h1>Nachrichten</h1>
   @if(count($messages) >0) 
   		@foreach($messages as $message)
   			<div class="card card-body bg-light">
   	   				<p>Betreff: {{$message->betreff}}</p>
   	   				<p>{{$message->inhalt}}</p>
   				<small>erzeugt am {{$message->created_at}}</small>
   				<p><br>
   				<a href="{{ route('writeMessage', ['carUser_id'=>$message->senderID]) }}" class="btn btn-primary">Antworten</a>
   			</div>
   		@endforeach
   		{{ $messages->links() }}
   @else
   		<p>Keine Nachrichten gefunden </p>
   @endif

@endsection