@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('createMessage', ['carUser'=>$user]) }}">
    {{csrf_field()}}
      <label>Senden an: <b>'{{ $user->first_name }}'</b></label>
      <div class="form-group">
        <label for="betreff">Betreff</label>
        <input type="text" class="form-control" name="betreff" value="" placeholder="Betreff einf&uuml;gen" required>
      </div>
      <div class="form-group">
        <label for="inhalt">Nachricht</label>
        <textarea class="form-control" name="inhalt" rows="3" value="" required></textarea>
      </div>
      <input type="submit" value="Senden" class="btn btn-primary">
    </form>

@endsection

