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
            <form class="form-inline">
                <input 
                    class="form-control mr-sm-2" 
                    type="search" 
                    placeholder="Ricerca Avanzata" 
                    aria-label="Search"
                    v-model="searchString" 
                    v-on:keyup="searchUser()"
                >
                <ul class="list-group">
                    <li class="list-group-item" v-for="user in users">
                        <img :src="'/storage/' + user.pic" alt="" style="height: 2em;">
                        <a :href="'bards/' + user.id">
                            @{{ user.name + ' ' + user.lastname }}
                        </a>
                    </li>
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
            </form>
        </div>
    </div>
    {{-- END vue container --}}
@endsection