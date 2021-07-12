@extends('layouts.app')
@section('content')
    <div class="container">

        @include("partials.success-error-messages")
        @include("partials.validation-errors")

        <h1>Invia un messaggio a @{{Nome}} @{{Cognome}}</h1>

        {{-- form lascia una recensione --}}
        <form action="{{route("store-message")}}" method="post">

            @csrf
            @method("POST")

            {{-- nome autore --}}
            <div class="form-group mt-4 mb-4">
                <label for="author_name">Autore</label>
                <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Inserisci il tuo nome" value="{{old("author_name")}}" required>
            </div>

            {{-- email autore --}}
            <div class="form-group mt-4 mb-4">
                <label for="author_email">Email</label>
                <input type="email" class="form-control" id="author_email" name="author_email" placeholder="Inserisci il tuo indirizzo email" value="{{old("author_email")}}" required>
            </div>

            {{-- contenuto messaggio --}}
            <div class="form-group mt-4 mb-4">
                <label for="text">Testo messaggio</label>
                <textarea class="form-control" name="text" id="text" rows="10" placeholder="Scrivi la recensione">{{old("text")}}</textarea>
            </div>

            {{-- termini e condizioni --}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="terms-conditions" id="terms-conditions" required>
                <label class="form-check-label" for="terms-conditions">Accetta Termini e Condizioni</label>
            </div>

            {{-- tasto per inviare recensione --}}
            <button type="submit" class="btn btn-primary mt-4">
                Invia messaggio
            </button>

        </form>

        {{-- tasto per refreshare la pagina --}}
        <div class="text-right">
            <a class="btn btn-outline-dark" href="{{route("send-message")}}" style="transform: translateY(-38px)">Svuota i campi</a>
        </div>
        
    </div>
@endsection