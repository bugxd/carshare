Hi {{ $first_name, $last_name }}
    <p> Registrierung fast abgeschlossen, klicken Sie den Link unten an!</p>

<a>{{ route('confirmation', $activation_code) }}</a>