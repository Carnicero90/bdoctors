@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
    </div>

@endsection