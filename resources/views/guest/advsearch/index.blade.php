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

<div class="top-margine">

    {{-- vue container --}}
    <div id="root">

        <div class="container">

            {{-- Searchbar --}}
            <div class="row mb-4">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-2 col-md-8 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                    <input class="form-control adv-search-bar" type="search" placeholder="Ricerca Avanzata" aria-label="Search" v-model="searchString" v-on:keyup="searchUser()">
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-6 col-sm-6 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
                    <button class="btn btn-custom-danger text-white" v-on:click="sortUsersByReviewNum()">Ordina per num recensioni</button>
                </div>
                <div class="col-6 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <button class="btn btn-custom-success text-white" v-on:click="sortUsersByReviewAvg()">Ordina per media voti</button>
                </div>
            </div>
            {{-- End Searchbar --}}

            {{-- lista categorie --}}
            {{-- btn-dark --}}
            <div class="col-12 d-flex justify-content-center flex-wrap mt-4 mb-5">
                <div v-for="category, index in categories" v-on:click="addOrRemoveCat(category.id)">
                    <span class="btn btn-outline-dark cat-box ml-1 mr-1 mb-2" :class="selectedCat(category.id) ? 'selected' : '' ">@{{category.name.replace("registrazione e mixaggio", "rec & mix")}}</span>
                </div>
            </div>
            {{-- END lista categorie --}}

            {{-- elenco risultati users --}}
            <div class="row mt-4 d-flex align-items-center justify-content-center">
                <div v-for="user in users" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                    @include("partials.user-card-api")
                </div>
            </div>
            {{-- END elenco risultati users --}}

        </div>

    </div>
    {{-- END vue container --}}

</div>

@endsection