@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="text-center mt-5">
            <h1 class="text-center">BOOLBARDS</h1>
            <a href="" class="btn-btn-warning">pwd: cavecanem</a>
            <a href="{{ route("profile", ['id' => 1]) }}" class="btn btn-success ml-3 mr-3">Pagina pubblica profilo di esempio</a>
            {{-- <a href="{{route("send-message")}}" class="btn btn-primary ml-3 mr-3">Scrivi messaggio</a> --}}
            <a href="{{ route("sponsor-index") }}" class="btn btn-primary ml-3 mr-3">Piani abbonamento</a>
        </div>
        
    </div>
@endsection