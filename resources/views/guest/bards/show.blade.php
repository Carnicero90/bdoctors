@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }} {{ $user->lastname }}</h1>
        <p>E-mail: {{ $user->email }}</p>
        <p>Indirizzo: {{ $user->address }}</p>
    </div>
@endsection