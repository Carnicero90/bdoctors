@extends('layouts.app')
@section('header-scripts')
    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('footer-scripts')
    <script src="{{ asset('js/advsearch.js') }}"></script>
@endsection

@section('content')

    {{-- TODO --}}
    {{-- vue container --}}
    <div id="root">

        <div class="container">

            {{-- Searchbar --}}
            <div class="form-inline mt-3 mb-4 flex justify-content-center">
                <input class="form-control mr-3" type="search" placeholder="Ricerca Avanzata" aria-label="Search" v-model="searchString" v-on:keyup="searchUser()" style="width: 300px;">
                <button class="btn btn-primary mr-3" v-on:click="sortUsersByReviewNum()"><i class="fas fa-chevron-down mr-1"></i>Ordina per numero recensioni</button>
                <button class="btn btn-primary mr-3" v-on:click="sortUsersByReviewAvg()"><i class="fas fa-chevron-down mr-1"></i>Ordina per media voti</button>
            </div>
            {{-- End Searchbar --}}

            {{-- lista categorie --}}
            <div class="d-flex justify-content-between mb-5">
                <div v-for="category, index in categories" v-on:click="addOrRemoveCat(category.id)">
                    <span class="btn btn-outline-dark" :style="selectedCat(category.id) ? 'background: #343a40; color: white;' : ''">@{{category.name.replace("registrazione e mixaggio", "rec & mix")}}</span>
                </div>
            </div>
            {{-- END lista categorie --}}

            {{-- elenco risultati users --}}
            <div class="row mt-4 d-flex align-items-center justify-content-around">
                <div v-for="user in users" style="width: 21%">
                    @include("partials.user-card-api")
                </div>
            </div>
            {{-- END elenco risultati users --}}

        </div>

    </div>
    {{-- END vue container --}}
    {{-- END TODO --}}
@endsection
