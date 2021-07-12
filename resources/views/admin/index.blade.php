@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Dashboard</h2>
        <div>
            <a href="#"></a>
        </div>
    </div>

@endsection