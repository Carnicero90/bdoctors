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

            <div class="mt-4">
                <h1>BOOLBARDS</h1>
            </div>

            <!-- input ricerca da usare con VueJs -->
            <div class="mt-5 mb-5">
                <select name="" id="">Cerca blabla</select>
                <label for=""></label>
                <input type="text" v-model="searchString" v-on:keyup="searchUser()" placeholder="cerca un bard">
            </div>
            <div v-if="searching" style="width: 200px; background: whitesmoke; margin: auto;">
                <ul>
                    {{-- TODO: test --}}
                    <li v-for="user in users">
                       <a :href="'bards/' + user.id">
                        @{{ user.name + ' ' + user.lastname }}
                           </a> 
                    </li>
                </ul>
                <a href="" class="btn">Ricerca Avanzata</a>
            </div>

            <div>
                <a href="{{ route('profile', ['id' => 1]) }}" class="btn btn-success ml-2 mr-2">Pagina pubblica profilo diesempio</a>
                <a href="{{ route('sponsor-index') }}" class="btn btn-primary ml-2 mr-2">Vedi i piani di abbonamento</a>
                <a href="{{route("categories")}}" class="btn btn-primary ml-2 mr-2">Visualizza le categorie degli artisti</a>
            </div>

        </div>

        {{-- section sponsored --}}
            <section class="mt-4">
                <div class="container">
                    <h2 class="text-center">I nostri artisti del momento</h2>
                    <ul>
                        <li v-for="user in users">
                            <p> @{{ user.name + ' ' + user.lastname }}</p>
                            {{-- TODO: boh, magari la media voti la mostriamo solo se supera un tot? Pagano, non e' bellino per loro vedersi un
                            pallino solo come media recensioni (d'altra parte affari loro, bohbohboh) --}}
                            <div v-if="user.avg_vote > 0">
                                <i v-for="n in parseInt(user.avg_vote)" class="fas fa-star"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        {{-- END section sponsored --}}

    </div>
    {{-- END vue container --}}

@endsection
