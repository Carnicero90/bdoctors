@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">

        @include("partials.success-messages")
        @include("partials.validation-errors")
        <section>
            <h1>Invia un messaggio a {{ $user->name . ' ' . $user->lastname }}</h1>

            {{-- form lascia una recensione --}}
            <form action="{{ route('store-message', ['id' => $user->id]) }}" method="post">

                @csrf
                @method("POST")

                {{-- nome autore --}}
                <div class="form-group mt-4 mb-4">
                    <label for="author_name">Autore</label>
                    <input type="text" class="form-control" id="author_name" name="author_name"
                        placeholder="Inserisci il tuo nome" value="{{ old('author_name') }}" required>
                </div>

                {{-- email autore --}}
                <div class="form-group mt-4 mb-4">
                    <label for="author_email">Email</label>
                    <input type="email" class="form-control" id="author_email" name="author_email"
                        placeholder="Inserisci il tuo indirizzo email" value="{{ old('author_email') }}" required>
                </div>

                {{-- contenuto messaggio --}}
                <div class="form-group mt-4 mb-4">
                    <label for="text">Testo messaggio</label>
                    <textarea class="form-control" name="text" id="text" rows="10"
                        placeholder="Scrivi la recensione">{{ old('text') }}</textarea>
                </div>

                {{-- partials di termini e condizioni --}}
                @include('partials.terms-conditions')

                {{-- tasto per inviare recensione --}}
                <button type="submit" class="btn btn-outline-primary mt-4">
                    Invia messaggio
                </button>

            </form>

        </section>

    </div>
</div>

@endsection
