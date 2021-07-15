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
                  <label class="input-group-text" for="inputGroupSelect01">Recensioni</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Recensioni ricevute</option>
                  @foreach (Auth::user()->reviews as $review)
                    <option value="{{$review->vote_id}}">{{$review->author_name}}</option>
                  @endforeach
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


    </div>
    {{-- END vue container --}}
    {{-- END TODO --}}
@endsection