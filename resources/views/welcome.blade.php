@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="mt-4 mb-5">
            <h1 class="text-center">BOOLBARDS</h1>
        </div>

        <div class="text-center">
            <span class="btn btn-warning ml-2 mr-2">Password: cavecanem</span>
            <a href="{{route("profile", ['id' => 1])}}" class="btn btn-success ml-2 mr-2">Pagina pubblica profilo di esempio</a>
            {{-- <a href="{{route("send-message")}}" class="btn btn-primary ml-3 mr-3">Scrivi messaggio</a> --}}
            <a href="{{route("sponsor-index")}}" class="btn btn-primary ml-2 mr-2">Piani abbonamento</a>
        </div>
        
    </div>

@endsection