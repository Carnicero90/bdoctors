@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="text-center mt-5">
            <a href="{{route("send-review")}}" class="btn btn-primary mr-3">Scrivi recensione</a>
            <a href="{{route("send-message")}}" class="btn btn-primary ml-3">Scrivi messaggio</a>
        </div>
        
    </div>
@endsection