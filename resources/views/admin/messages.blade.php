@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Ecco la lista dei messaggi che gli utenti ti hanno inviato:</h2>
    </div>

@endsection