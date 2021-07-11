@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>Lascia una recensione per @{{Nome}} @{{Cognome}}</h1>
        <h2>@{{categoria}}</h2>

        @include("partials.validation-errors")

        {{-- form lascia una recensione --}}
        <form action="{{route("store-review")}}" method="post" enctype="multipart/form-data">

            @csrf
            @method("POST")

            {{-- nome autore --}}
            <div class="form-group mt-4 mb-4">
                <label for="author_name">Nome</label>
                <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Inserisci il tuo nome" value="{{old("author_name")}}" required>
            </div>

            {{-- email autore --}}
            <div class="form-group mt-4 mb-4">
                <label for="author_email">Email</label>
                <input type="email" class="form-control" id="author_email" name="author_email" placeholder="Inserisci il tuo indirizzo email" value="{{old("author_email")}}" required>
            </div>

            {{-- contenuto recensione --}}
            <div class="form-group mt-4 mb-4">
                <label for="content">Testo recensione</label>
                <textarea class="form-control" name="content" id="content" rows="10" placeholder="Scrivi la recensione">{{old("content")}}</textarea>
            </div>

            {{-- voto recensione --}}
            <div class="form-group mt-4 mb-4">
                <label for="vote_id" class="mr-4">Come definiresti la prestazione dell'artista?</label>
                <select class="custom-select col-md-3" name="vote_id" id="vote_id">
                    <option selected>Seleziona una valutazione</option>
                    @foreach ($votes as $vote)
                        <option value="{{$vote->value}}">
                            {{$vote->value . " - " . ucfirst($vote->label)}}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- tasto per inviare recensione --}}
            <button type="submit" class="btn btn-primary mt-4">
                Invia
            </button>

        </form>

        {{-- tasto per refreshare la pagina --}}
        <div class="text-right">
            <a class="btn btn-outline-dark" href="{{route("send-review")}}" style="transform: translateY(-38px)">Svuota i campi</a>
        </div>
        
    </div>
@endsection