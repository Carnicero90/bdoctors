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

            {{-- form lascia una recensione --}}
            <form action="{{ route('store-review', ['id' => $user->id]) }}" method="post">

                @csrf
                @method("POST")

                {{-- voto recensione --}}
                <div class="form-group">
                    {{-- TODO: per ora lasciamo un h3, che poi potrebbe essere un label (dipende da cosa rispondono al TOASK sottostante) --}}
                    <h3>Come valuteresti il servizio offertoti da {{ $user->name }}?</h3>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    {{-- voto recensione TODO: rimetti a posto --}}
                    {{-- TOASK: metto un select nascosto, per robe di usabilita? --}}
                    <div class="vote d-flex">
                        <input type="hidden" name="vote_id" :value="selectedValue">
                        <div v-for="vote, index in votes">
                            <div class="votes">
                                {{-- TODO: sposta in sass --}}
                                <i class="fas fa-star" :style="index <= value ? 'color:red' : '' " 
                                    v-on:mouseover="fillStars(index)"
                                    v-on:mouseleave="backToPreviousVoteValue()"
                                    v-on:click="selectVoteValue(index, vote.value)"></i>
                            </div>
                            <span class="vote-label" v-if="clickedValue == index">@{{ vote . label }}</span>
                        </div>
                    </div>
                </div>



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
                {{-- <div class="form-group mt-4 mb-4">
                    <label for="vote_id" class="mr-4">Come definiresti la prestazione dell'artista?</label>
                    <select class="custom-select col-md-3" name="vote_id" id="vote_id">
                        <option selected>Seleziona una valutazione</option>
                        @foreach ($votes as $vote)
                            <option value="{{ $vote->value }}">
                                {{ $vote->value . ' - ' . ucfirst($vote->label) }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

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
