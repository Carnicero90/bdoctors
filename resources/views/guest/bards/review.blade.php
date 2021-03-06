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

<div class="top-margine">
    <div class="container">
        {{-- div#root --}}
        <div id="root">

            @include("partials.success-messages")
            @include("partials.validation-errors")

            {{--TEST_LEVARE--}}
            {{-- {{dd($reviews)}} --}}

            <div class="mb-5">
                <h1>Lascia una recensione per {{ $user->name . ' ' . $user->lastname }}</h1>
            </div>

            {{-- form lascia una recensione --}}
            <form action="{{ route('store-review', ['id' => $user->id]) }}" method="post">

                @csrf
                @method("POST")

                {{-- voto recensione --}}
                <div class="form-group">
                    <h3>Come valuteresti il servizio offertoti da {{ $user->name }}?</h3>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="vote d-flex">
                        <input type="hidden" name="vote_id" :value="selectedValue">
                        <div v-for="vote, index in votes">
                            <div class="votes">
                                <i class="fas fa-star star" :class="index <= value ? 'filled' : 'empty'"
                                    v-on:mouseover="fillStars(index)" v-on:mouseleave="backToPreviousVoteValue()"
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

                {{-- select servizio ricevuto --}}
                <div class="form-group mt-4 mb-4">
                    <label for="content" class="d-inline-block mr-3">Hai usufruito di un servizio?</label>
                    <select class="form-control d-inline-block width-120px" name="service_received" id="service_received" required>
                        <option value="" disabled selected>Seleziona</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>
                
                {{-- partials di termini e condizioni --}}
                <div class="form-group form-check">
                    @include('partials.terms-conditions')
                </div>

                {{-- tasto per inviare recensione --}}
                <button type="submit" class="btn btn-outline-primary mb-4 mt-4">
                    Invia
                </button>

            </form>
        </div>
        {{-- END div#root --}}
    </div>
</div>

@endsection
