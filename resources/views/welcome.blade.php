@extends('layouts.app')
@section('header-scripts')

    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

@endsection

@section('footer-scripts')

    {{-- file JavaScript --}}
    <script src="{{ asset('js/home.js') }}"></script>

@endsection

@section('content')
    {{-- vue container --}}
    <div id="root">

        <div class="mio-jumbotron">

            <div class="container">

                <div class="jumbo-container position-relative">
                    <h1 class="display-2 heading-logo">Trova il tuo Bardo</h1>
                    <img class="jumbo-logo" src="{{asset('img/boolbards-white-1.png')}}" alt="">
                </div>

                <!-- input ricerca da usare con VueJs -->
                <div class="rel ricerca">
                    <select class="select-category c-1" name="catselector" v-model="selectedCategory" v-on:change="searchUser()">
                        <option value="0" selected disabled>Seleziona una categoria</option>
                        <option value="">Tutte le categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>

                    <div class="d-inline-block position-relative search-a-bard">
                        <div class="search-bard-input">
                            <input type="text" v-model="searchString" v-on:keyup="searchUser()" placeholder="Cerca un bard">
                            <i class="fas fa-search position-absolute search-icon"></i>
                        </div>

                        <div v-if="searching" class="searchbox">
                            <ul class="list-group">
                                {{-- TODO: test --}}
                                <li class="list-group-item" v-for="user in users">
                                    <a :href="'bards/' + user.id" class="d-flex align-items-center c-1">
                                        <div class="mr-2 profile-img-search-container position-relative">
                                            <img class="mr-2 profile-img-search" v-if="user.pic" :src="'/storage/' + user.pic" alt="">
                                            <img class="mr-2 profile-img-search" v-else src="{{asset("/img/user-img.png")}}" alt="">
                                        </div>
                                        <span>@{{ user . name + ' ' + user . lastname }}</span>
                                        <span v-if="user.sponsored" class="sponsored-badge-search">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-group-item" class="show-more-res">
                                    <a :href="'/advancedsearch?name=' + searchString + '&cat=' + advsearchCat" class="c-1"><i class="fas fa-search mr-2"></i>Mostra più risultati</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="top-margine">
            {{-- section categories --}}
            <div class="container mt-5 mb-5">
                <h2 class="text-center">Categorie</h2>
                <div class="row mt-4">
                    @foreach ($categories as $category)
                        @include("partials.categories-list")
                    @endforeach
                </div>
            </div>
            {{-- END section categories --}}

            {{-- section sponsored --}}
            <div class="container">
                <h2 class="text-center">I nostri artisti del momento</h2>
                <div v-on:click="slideLeft">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="row mt-4 d-flex align-items-center justify-content-center">
                    <div v-for="user in sponsoredUsers.slice(start_index, start_index + tot_to_show)" class="col-3">
                        @include("partials.user-card-api")
                    </div>
                </div>
                <div v-on:click="slideRight">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            {{-- END section sponsored --}}
        </div>

    </div>
    {{-- END vue container --}}

@endsection