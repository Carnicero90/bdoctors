@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Ecco la lista delle recensioni lasciate per te dagli utenti:</h2>
    </div>

@endsection