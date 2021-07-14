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
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')

    {{-- vue container --}}
    <div id="root">
        <div class="container">

            @include("partials.success-messages")
            @include("partials.validation-errors")

            {{-- form profile --}}
            <form action="{{ route('admin.profile-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")

                {{-- input#work_address --}}
                <div class="form-group mt-4 mb-4">
                    <label for="work_address">Indirizzo / Luogo di Lavoro</label>
                    <input type="text" class="form-control" id="work_address" name="work_address"
                        placeholder="Inserisci il tuo indirizzo"
                        value="{{ Auth::user()->profile ? Auth::user()->profile->work_address : old('work_address') }}">
                </div>
                {{-- END input#work_address --}}

                {{-- input#phone_number --}}
                <div class="form-group mt-4 mb-4">
                    <label for="phone_number">Numero di telefono</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number"
                        placeholder="Inserisci il tuo numero di telefono"
                        value="{{ Auth::user()->profile ? Auth::user()->profile->phone_number : old('phone_number') }}">
                </div>
                {{-- END input#phone_number --}}

                {{-- TODO --}}
                <div class="form-group">
                    <label for="categories" class="d-block">Scegli le tue categorie</label>
                    @foreach ($categories as $category)
                        <div class="form-check d-inline-block mr-5 mb-2">
                            <input class="form-check-input" name="categories" type="checkbox">
                            <label class="form-check-label" for="categories-{{$category->id}}">{{$category->name}}</label>
                        </div>
                    @endforeach
                </div>
                {{-- END TODO --}}

                {{-- input#self_description --}}
                <div class="form-group mt-4 mb-4">
                    <label for="self_description">Descriviti</label>
                    <textarea class="form-control" name="self_description" id="self_description" rows="6"
                        placeholder="Scrivi una descrizione per il tuo profilo">{{ Auth::user()->profile ? Auth::user()->profile->self_description : old('self_description') }}</textarea>
                </div>
                {{-- END input#self_description --}}

                {{-- input#image-file --}}
                <div class="form-group mt-4">
                    <label for="image-file">Carica un'immagine profilo</label>
                    <input type="file" class="form-control-file" id="image-file" name="image-file">
                </div>
                {{-- END input#image-file --}}

                {{-- singola prestazione --}}
                <div class="mt-5">
                    <h3>Prestazioni</h3>
                    <div class="card mb-4" v-for="number in numbers">
                        <div class="card-body pb-2">
                            <h4>Aggiungi prestazione</h4>
                            {{-- input#title --}}
                            <div class="form-group mt-3 mb-4">
                                <label for="title">Nome servizio</label>
                                <input type="text" class="form-control" id="title" :name="'service' + number + '[title]'" placeholder="Inserisci il nome del servizio">
                            </div>
                            {{-- END input#name --}}
        
                            {{-- input#description --}}
                            <div class="form-group mt-4 mb-4">
                                <label for="description">Descrizione servizio</label>
                                <textarea class="form-control" :name="'service' + number + '[description]'" id="description" rows="3"
                                    placeholder="Descrivi il servizio offerto"></textarea>
                            </div>
                            {{-- END input#description --}}
        
                            {{-- input#hourly_rate --}}
                            <div class="form-group mt-4">
                                <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                                <input type="number" step="0.50" class="form-control d-inline-block" style="width: 100px;" id="hourly_rate" :name="'service' + number + '[hourly_rate]'" placeholder="00,00">
                                <label class="d-inline-block ml-1">€</label>
                            </div>
                            {{-- END input#hourly_rate --}}
                        </div>
                    </div>
                </div>
                {{-- END singola prestazione --}}

                {{-- tasto per aggiungere altra prestazione --}}
                <div>
                    <a class="btn btn-primary" v-on:click="numbers++">
                        <i class="fas fa-plus"></i>
                        Aggiungi altra prestazione
                    </a>
                </div>
                {{-- END tasto per aggiungere altra prestazione --}}
                
                {{-- bottone per invio form --}}
                <button type="submit" class="btn btn-success mt-5">
                    @if (Auth::user()->profile)
                        Salva modifiche
                    @else
                        Crea profilo
                    @endif
                </button>
                {{-- END bottone per invio form --}}

            </form>
            {{-- END form profile --}}

        </div>

    </div>
    {{-- END vue container --}}

@endsection