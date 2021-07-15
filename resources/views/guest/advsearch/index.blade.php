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
            <form class="form-inline mb-3">
                <input 
                    class="form-control mr-sm-2" 
                    type="search" 
                    placeholder="Ricerca Avanzata" 
                    aria-label="Search"
                    {{-- v-model="searchString"  --}}
                    {{-- v-on:keyup="searchUser()" --}}
                >
                <ul class="list-group">

                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
            </form>
            {{-- End Searchbar --}}

            {{-- TODO Select --}}
            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Filtra risultati</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Totale recensioni ricevute</option>
                  @for ($i = 0; $i < 4; $i++)
                  <option value="{{ $review_step*$i }}">{{ $review_step*$i }} +</option>
                  @endfor
                </select>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Media Recensioni</option>
                    @foreach ($votes as $vote)
                        <option value="{{$vote->value}}">
                            {{$vote->value . " - " . ucfirst($vote->label)}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- END TODO Select --}}

        </div>
        <div v-for="user in users" style="width: 21%">
            <a :href="'bards/' + user.id" style="text-decoration: none; color: #444;">
                <div class="card mb-4">
                    {{-- TODO: boh, magari la media voti la mostriamo solo se supera un tot? Pagano, non e' bellino per loro vedersi un
                    pallino solo come media recensioni (d'altra parte affari loro, bohbohboh) --}}
                    <div class="card-body d-flex flex-column align-items-center">
                        <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                            <img v-if="user.pic" :src="'/storage/' + user.pic" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">
                            <img v-else src="http://127.0.0.1:8000/img/user-img.png" alt="" style="max-height: 120px;">
                        </div>
                        <div class="mt-3 mb-2 font-weight-bold">
                            <span>@{{ user . name + ' ' + user . lastname }}</span>
                        </div>
                        <div class="text-secondary">
                            <small><p>categoria user</p></small>
                        </div>
                        <div>
                            <span v-if="user.avg_vote > 0"><i v-for="n in parseInt(user.avg_vote)" class="fas fa-star"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    {{-- END vue container --}}
    {{-- END TODO --}}
@endsection