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
    <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
    {{-- vue container --}}
    <div id="root" class="jumbo-container">

        <div class="jumbotron">

            <div class="container">

                <h1 class="main-title mb-4" style="font-size: 70px"><img class="mr-4" src="{{asset('img/logo-jumb.png')}}" alt=""></i>BOOLBARDS</h1>

                <!-- input ricerca da usare con VueJs -->
                <div class="mb-5" style="position: relative">
                    <select class="select-category mr-1" name="" id="" v-model="selectedCategory" v-on:change="searchUser()" style="width: 223px; height: 35px; transform:translateY(+3px); padding-left: 15px; background-color: black; color: #888; font-size: 18px; border-radius: 3px;">
                        <option value="" selected disabled>Seleziona una categoria</option>
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div v-if="searching" style="width: 200px; position: absolute; left: 29.3%; top: 105%; transform: translateX(-50%); z-index: 999;">
                        <ul class="list-group">
                            {{-- TODO: test --}}
                            <li class="list-group-item" v-for="user in users" style="width: 220px; background-color: #111; border-color: #888; position: relative; padding: 10px;">
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
                                <a style="color: #888" :href=`/advancedsearch?cat=${selectedCategory}&name=${searchString}`><i class="fas fa-search mr-2"></i>Mostra più risultati</a>
                            </li>
                        </ul>
                    </div>

                    <label for=""></label>
                    <input type="text" v-model="searchString" v-on:keyup="searchUser()" placeholder="Cerca un bard" style="width: 200px; height: 37px; transform: translateY(+2px); padding-left: 5px; background-color: black; color: white; font-size: 18px; border: 0; border-bottom: 2px solid #444;">

                    <a href="{{ route('advanced-search') }}" class="btn btn-secondary ml-2 mr-2" style="background-color: #111; color: #888"><i class="fas fa-search mr-2"></i>Ricerca avanzata</a>

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