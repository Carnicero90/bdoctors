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
    <div id="root" class="jumbo-container">

        <div class="jumbotron">

            <div class="container">

                <div>
                    <img class="jumbo-logo" src="{{asset('img/boolbards-white-1.png')}}" alt="">
                </div>

                <!-- input ricerca da usare con VueJs -->
                <div class="rel">
                    <select class="select-category mr-1" name="catselector" v-model="selectedCategory" v-on:change="searchUser()">
                        <option value="0" selected disabled>Seleziona una categoria</option>
                        <option value="">Tutte le categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>

                    <div v-if="searching" class="searchbox">
                        <ul class="list-group">
                            {{-- TODO: test --}}
                            <li class="list-group-item" v-for="user in users">
                                <a :href="'bards/' + user.id" class="d-flex align-items-center" style="color: #888;">
                                    <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden;" class="mr-2">
                                        <img class="mr-2" v-if="user.pic" :src="'/storage/' + user.pic" alt="" style="max-height: 40px;">
                                        <img class="mr-2" v-else src="{{asset("/img/user-img.png")}}" alt="" style="max-height: 40px;">
                                    </div>
                                    <span>@{{ user . name + ' ' + user . lastname }}</span>
                                    <span v-if="user.sponsored" style="position: absolute; top: 5px; right: 5px;">
                                        <i class="fas fa-star"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-group-item" style="width: 220px; background-color: #111; border-color: #888;">
                                <a style="color: #888" :href="'/advancedsearch?name=' + searchString + '&cat=' + advsearchCat"><i class="fas fa-search mr-2"></i>Mostra più risultati</a>
                            </li>
                        </ul>
                    </div>

                    <div class="d-inline-block" style="position: relative;">
                        <input type="text" v-model="searchString" v-on:keyup="searchUser()" placeholder="Cerca un bard" style="width: 200px; height: 37px; transform: translateY(+2px); padding-left: 30px; background-color: transparent; color: white; border: 0; border-bottom: 2px solid #444;">
                        <i class="fas fa-search" style="color: #777; position: absolute; top: 13px; left: 7px;"></i>
                    </div>

                </div>

            </div>

        </div>

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
            <div class="row mt-4 d-flex align-items-center justify-content-between">
                <div v-for="user in sponsoredUsers" style="width: 21%">
                    @include("partials.user-card-api")
                </div>
            </div>
        </div>
        {{-- END section sponsored --}}

    </div>
    {{-- END vue container --}}

@endsection