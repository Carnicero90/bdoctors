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

            <div class="mt-4 mb-5">
                <h1>BOOLBARDS</h1>
            </div>

            <!-- input ricerca da usare con VueJs -->
            <div>
                <label for="">
                    <input type="text" placeholder="cerca un bard">
                </label>
            </div>

            <div>
                <a href="{{ route('profile', ['id' => 1]) }}" class="btn btn-success ml-2 mr-2">Pagina pubblica profilo di
                    esempio</a>
                <a href="{{ route('sponsor-index') }}" class="btn btn-primary ml-2 mr-2">Vedi i piani di abbonamento</a>
            </div>

        </div>
        <ul>
            <li v-for="user in users">
                @{{ user.name + ' ' + user.lastname }}
            </li>
        </ul>

    </div>
    {{-- END vue container --}}


@endsection
