@extends('layouts.app')
@section('content')

    <div class="container text-center">

        <div class="mt-4 mb-5">
            <h1>BOOLBARDS</h1>
        </div>

        <!-- input ricerca da usare con VueJs -->
        <div>
            <label for="">
                <input type="text" placeholder="cerca un bard">
            </label>
        </div>

        <div>
            <a href="{{route("profile", ['id' => 1])}}" class="btn btn-success ml-2 mr-2">Pagina pubblica profilo di esempio</a>
            <a href="{{route("sponsor-index")}}" class="btn btn-primary ml-2 mr-2">Vedi i piani di abbonamento</a>
        </div>
        
    </div>

@endsection