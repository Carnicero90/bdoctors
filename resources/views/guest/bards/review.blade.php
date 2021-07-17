@extends('layouts.app')
@section('header-scripts')
    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>@endsection

@section('footer-scripts')
    <script src="{{ asset('js/review.js') }}"></script>
@endsection

@section('content')

    <div class="container">
        {{-- div#root --}}
        <div id="root">

            @include("partials.success-messages")
            @include("partials.validation-errors")

            <h1>Lascia una recensione per {{ $user->name . ' ' . $user->lastname }}</h1>
            <div class="mb-4">
                <h6>Categorie:</h6>
                @foreach ($user->categories as $category)
                    <a class="btn btn-outline-dark"
                        href="{{ route('category-page', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                @endforeach
            </div>
            <div>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M8.456.344 10.17 5.66l5.353.065c.461.006.652.62.282.909l-4.295 3.35 1.595 5.358c.137.461-.361.841-.737.562L8 12.658l-4.368 3.246c-.375.28-.874-.101-.737-.561L4.49 9.985.195 6.635c-.37-.289-.179-.904.282-.91L5.83 5.66 7.544.343a.475.475 0 0 1 .912 0z"></path></svg> --}}
                <i class="fas fa-star" 
                :style="index <= value ? 'color:red' : '' "
                v-for="vote, index in votes" 
                v-on:mouseover="fillStars(index)" 
                v-on:mouseleave="clickedValue > -1? fillStars(clickedValue) : fillStars(-1)" 
                v-on:click="clickedValue=index"></i>
                {{-- <p>@{{ votes }}</p> --}}
            </div>

            {{-- form lascia una recensione --}}
            <form action="{{ route('store-review', ['id' => $user->id]) }}" method="post">

                @csrf
                @method("POST")

                <input type="hidden" name="user_id" value="{{ $user->id }}">

                {{-- nome autore --}}
                <div class="form-group mt-4 mb-4">
                    <label for="author_name">Nome</label>
                    <input type="text" class="form-control" id="author_name" name="author_name"
                        placeholder="Inserisci il tuo nome" value="{{ old('author_name') }}" required>
                </div>

                {{-- email autore --}}
                <div class="form-group mt-4 mb-4">
                    <label for="author_email">Email</label>
                    <input type="email" class="form-control" id="author_email" name="author_email"
                        placeholder="Inserisci il tuo indirizzo email" value="{{ old('author_email') }}" required>
                </div>

                {{-- contenuto recensione --}}
                <div class="form-group mt-4 mb-4">
                    <label for="content">Testo recensione</label>
                    <textarea class="form-control" name="content" id="content" rows="10"
                        placeholder="Scrivi la recensione">{{ old('content') }}</textarea>
                </div>

                {{-- voto recensione --}}
                <div class="form-group mt-4 mb-4">
                    <label for="vote_id" class="mr-4">Come definiresti la prestazione dell'artista?</label>
                    <select class="custom-select col-md-3" name="vote_id" id="vote_id">
                        <option selected>Seleziona una valutazione</option>
                        @foreach ($votes as $vote)
                            <option value="{{ $vote->value }}">
                                {{ $vote->value . ' - ' . ucfirst($vote->label) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- partials di termini e condizioni --}}
                @include('partials.terms-conditions')

                {{-- tasto per inviare recensione --}}
                <button type="submit" class="btn btn-primary mt-4">
                    Invia
                </button>

            </form>

            {{-- tasto per refreshare la pagina --}}
            <div class="text-right">
                {{-- <a class="btn btn-outline-dark" href="{{route("send-review")}}" style="transform: translateY(-38px)">Svuota i campi</a> --}}
            </div>
        </div>
        {{-- END div#root --}}
    </div>

@endsection
