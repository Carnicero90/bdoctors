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

        <div class="container text-center">
            {{-- Searchbar --}}
            <div class="form-inline mb-3">
                <input class="form-control mr-3" type="search" placeholder="Ricerca Avanzata" aria-label="Search"
                    v-model="searchString" v-on:keyup="searchUser()">
                <ul class="list-group"></ul>
                <button class="btn btn-outline-success mr-3">Cerca</button>
                <button class="btn btn-primary mr-3" v-on:click="sortUsersByReviewNum()">Ordina per numero
                    recensioni</button>
                <button class="btn btn-warning mr-3" v-on:click="sortUsersByReviewAvg()">Ordina per media voti</button>
            </div>
            {{-- End Searchbar --}}
        </div>
        <div class="container text-center">
            <div class="d-flex">
                <div class="mb-4" :style="selectedCat(category.id) ? 'background: lightgrey;' : ''"
                    v-for="category, index in categories" v-on:click="addOrRemoveCat(category.id)">
                    <span class="btn btn-outline-dark">@{{ category . name }}</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-4 d-flex align-items-center justify-content-around">
                <div v-for="user in users" style="width: 21%">
                    <a :href="'bards/' + user.id" style="text-decoration: none; color: #444;">
                        <div class="card mb-4" style="height: 297px;">
                            {{-- TODO: boh, magari la media voti la mostriamo solo se supera un tot? Pagano, non e' bellino per loro vedersi un
                            pallino solo come media recensioni (d'altra parte affari loro, bohbohboh) --}}
                            <div class="card-body d-flex flex-column align-items-center">
                                <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                                    <img v-if="user.pic" :src="'/storage/' + user.pic" alt=""
                                        style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">
                                    <img v-else src="{{ asset('/img/user-img.png') }}" alt="" style="max-height: 120px;">
                                </div>
                                <div class="mt-3 mb-2 font-weight-bold">
                                    <span>@{{ user . name + ' ' + user . lastname }}</span>
                                </div>
                                <div class="text-secondary">
                                    <small>
                                        <span>id categoria = @{{ user . cat }}</span>
                                    </small>
                                </div>
                                <div class="mt-2">
                                    <span v-if="user.avg_vote > 0">
                                        <i v-for="n in parseInt(user.avg_vote)" class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <span v-if="user.nmb_reviews > 0">
                                        <small>
                                            <i class="fas fa-file-alt mr-1"></i> @{{ user . nmb_reviews }} recensioni
                                        </small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>


    </div>
    {{-- END vue container --}}
    {{-- END TODO --}}
@endsection
