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
    <div id="root">
        <div class="container text-center">

            <div class="mt-5 mb-5">
                <h1>BOOLBARDS</h1>
            </div>

            <!-- input ricerca da usare con VueJs -->
            <div class="mb-5" style="position: relative">
                <select name="" id="" v-model="selectedCategory" v-on:change="searchUser()">
                    <option value="" selected disabled>Seleziona una categoria</option>
                    <option value="">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div v-if="searching" style="width: 200px; background: whitesmoke; margin: auto; position: absolute; left: 57.5%; top: 100%; transform: translateX(-50%); z-index: 999;">
                    <ul class="list-group">
                        {{-- TODO: test --}}
                        <li class="list-group-item" v-for="user in users" style="width: 220px">
                            <a :href="'bards/' + user.id" class="d-flex align-items-center">
                                <img class="mr-2" v-if="user.pic" :src="'/storage/' + user.pic" alt="" style="height: 2em;">
                                <img class="mr-2" v-else src="http://127.0.0.1:8000/img/user-img.png" alt="" style="height: 2em;">
                                <span>@{{user . name + ' ' + user . lastname}}</span>
                            </a>
                        </li>
                        <li class="list-group-item list-group-item-action active" style="width: 220px">
                            <a class="list-group-item-action active" style="color: white" :href=`/advancedsearch?cat=${selectedCategory}&name=${searchString}`>Ricerca Avanzata</a>
                        </li>
                    </ul>
                </div>

                <label for=""></label>
                <input type="text" v-model="searchString" v-on:keyup="searchUser()" placeholder="cerca un bard">
            </div>

            <div class="mb-5">
                <a href="{{ route('profile', ['id' => 1]) }}" class="btn btn-success ml-2 mr-2">Pagina pubblica profilo
                    diesempio</a>
                <a href="{{ route('sponsor-index') }}" class="btn btn-primary ml-2 mr-2">Vedi i piani di abbonamento</a>
                <a href="{{ route('categories') }}" class="btn btn-primary ml-2 mr-2">Visualizza le categorie degli
                    artisti</a>
                <a href="{{ route('advanced-search') }}" class="btn btn-warning ml-2 mr-2">Pagina di ricerca avanzata</a>
            </div>
        </div>

        {{-- section sponsored --}}
        <div class="container pt-2">
            <h2>I nostri artisti del momento</h2>
            <div class="row mt-4">
                <div v-for="user in sponsoredUsers" class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <a :href="'bards/' + user.id">
                                @{{ user . name + ' ' + user . lastname }}
                            </a>
                            {{-- TODO: boh, magari la media voti la mostriamo solo se supera un tot? Pagano, non e' bellino per loro vedersi un
                            pallino solo come media recensioni (d'altra parte affari loro, bohbohboh) --}}
                        </div>
                        <div class="card-body">
                            <img class="mr-2" v-if="user.pic" :src="'/storage/' + user.pic" alt="" style="height: 5em;">
                            <img class="mr-2" v-else src="http://127.0.0.1:8000/img/user-img.png" alt="" style="height: 5em;">
                            <span v-if="user.avg_vote > 0"><i v-for="n in parseInt(user.avg_vote)"
                                    class="fas fa-star"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END section sponsored --}}

    </div>
    {{-- END vue container --}}

@endsection
