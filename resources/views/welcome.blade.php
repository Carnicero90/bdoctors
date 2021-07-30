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
                    <h1 class="display-2 heading-logo text-white">Trova il tuo Bardo</h1>
                    <img class="jumbo-logo" src="{{asset('img/welcome/boolbards-white.png')}}" alt="">
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
                            <input type="text" v-model="searchString" v-on:keyup="searchUser()" placeholder="Cerca un bardo">
                            <i class="fas fa-search position-absolute search-icon"></i>
                        </div>

                        <div v-if="searching" class="searchbox">
                            <ul class="list-group">
                                <li class="list-group-item" v-for="user in users">
                                    <a :href="'bards/' + user.id" class="d-flex align-items-center c-1 no-decorations">
                                        <div class="mr-2 profile-img-search-container position-relative">
                                            <img class="mr-2 profile-img-search" v-if="user.pic" :src="'/storage/' + user.pic" alt="">
                                            <img class="mr-2 profile-img-search" v-else src="{{asset("/img/user/user-img.png")}}" alt="">
                                        </div>
                                        <span>@{{ user . name + ' ' + user . lastname }}</span>
                                        <div v-if="user.sponsored" class="recommended-badge">
                                            <small class="badge badge-top">Top Bard</small>
                                        </div>
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

            {{-- section spiegazione --}}
            <div class="container pb-5">
                <h2 class="text-center text-uppercase">Nuovi artisti ogni giorno</h2>

                <div class="row justify-content-center">

                    <p class="description-text text-center mt-3"> <span class="text-evident text-white">BoolBards</span> è la piattaforma ideale per trovare il musicista che fa al caso tuo.<br>
                        Nuovi artisti si aggiungono alla nostra rete ogni giorno ed avrai la possibilità di visionare il loro profilo.<br>
                        Potrai scegliere un servizio tra quelli disponibili in base alle recensioni e<br>
                        quando avrai scelto, potrai contattare l'artista direttamente dalla sua pagina tramite messaggio.<br>
                        Cosa aspetti? Inizia la ricerca e scegli il <span class="text-evident text-white">Bardo</span> che fa al caso tuo!
                    </p>

                </div>
            </div>
            {{-- END section spiegazione --}}

            {{-- section sponsored --}}
            <hr>
            <div class="container mt-5 mb-5">
                <h2 class="text-center text-uppercase">I nostri artisti del momento</h2>

                <div class="row d-flex align-items-center position-relative justify-content-center">

                    <div class="arrow-slider left-arrow zoom" v-on:click="slideLeft">
                        <i class="fas fa-chevron-circle-left"></i>
                    </div>
    
                    <div v-for="user in sponsoredUsers.slice(start_index, start_index + tot_to_show)" class="mt-4 col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        @include("partials.user-card-api")
                    </div>
                    
                    <div class="arrow-slider right-arrow zoom" v-on:click="slideRight">
                        <i class="fas fa-chevron-circle-right"></i>
                    </div>

                </div>
            </div>
            {{-- END section sponsored --}}

            {{-- section categories --}}
            <hr>
            <div class="container mt-5 mb-5">
                <h2 class="text-center text-uppercase">Categorie</h2>
                <div class="row mt-4">
                    @foreach ($categories as $category)
                        @include("partials.categories-list")
                    @endforeach
                </div>
            </div>
            {{-- END section categories --}}

        </div>

    </div>
    {{-- END vue container --}}

@endsection