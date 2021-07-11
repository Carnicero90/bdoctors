@extends('layouts.app')

@section('start-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <meta name="user-id" content="{{ Auth::user()->id }}">
    {{-- TOTEST --}}
    <meta name="token" content="{{ Auth::user()->password }}">

@endsection

@section('end-scripts')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{-- div#root --}}
            <div id="root">
                <section>
                    <h1> @{{ title }} </h1>
                    <ul>
                        <li v-for="mail in mails">
                            @{{ mail }}
                            <form action="{{ route('destroy', ['user_id' => Auth::user()->id, 'message_id' => 3]) }}"
                                method="get">
                                @csrf
                                @method('GET')
                                <input type="submit" class="btn btn-danger" @submit.prevent
                                    onclick="return confirm('Vuoi eliminare definitivamente questo articolo? L\'operazione non potrà essere annullata')"
                                    value="cancella articolo">
                            </form>
                        </li>
                    </ul>
                    <button class="btn btn-primary">send</button>

                </section>
            </div>
            {{-- END div#root --}}
        </div>


    </div>
@endsection
