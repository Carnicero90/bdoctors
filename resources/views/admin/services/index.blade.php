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
    <script src="{{ asset('js/services.js') }}"></script>
@endsection

@section('content')

    {{-- vue container --}}
    <div id="root">
        <div class="container">

        {{-- HEADER --}}
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="dashboard">
                    @include('partials.dashboard-nav')
                </div>
            </div>
        </div>
        {{-- END HEADER --}}

            <div class="mt-3 mb-4">
                <h1>Aggiungi o crea una prestazione</h1>
            </div>

            @include('partials.success-messages')
            @include('partials.validation-errors')

            {{-- servizi gia esistenti, editabili o eliminabili --}}
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <h2>I tuoi attuali servizi</h2>
                </div>
                <div class="col-12">
                    @foreach ($services as $key => $service)
                    {{-- div service --}}
                        <div class="card mb-4" style="padding-bottom: 0;">
                            <div class="card-header">
                                <h3>{{ $service->title }}</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.service-update', ['id' => $service->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    {{-- input#user_id --}}
                                    <input type="hidden" name="id" value="{{ $service->id }}">
                                    {{-- END input#user_id --}}

                                    {{-- input#name --}}
                                    <div class="form-group">
                                        <label for="title">Nome servizio</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}">
                                    </div>
                                    {{-- END input#name --}}

                                    {{-- input#description --}}
                                    <div class="form-group">
                                        <label for="description">Descrizione:</label>
                                        <textarea class="form-control" name="description" id="description" rows="2" placeholder="Descrivi il servizio">{{ $service->description }}</textarea>
                                    </div>
                                    {{-- END input#description --}}

                                    {{-- input#hourly_rate --}}
                                    <div class="form-group">
                                        <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                                        <input type="number" step="0.50" class="form-control d-inline-block" id="hourly_rate" name="hourly_rate" value="{{ $service->hourly_rate }}" style="width: 100px;">
                                        <label class="d-inline-block ml-1">€</label>
                                    </div>
                                    {{-- END input#hourly_rate --}}

                                    {{-- Button Modifica Prestazione --}}
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check mr-2"></i>Salva modifiche</button>
                                    </div>

                                </form>

                                {{-- Delete --}}
                                <div class="text-right" style="transform: translateY(-38px);">
                                    <form action="{{ route('admin.service-destroy', ['id' => $service->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Sei sicuro di volere eliminare il tuo servizio?')"><i class="fas fa-times mr-2"></i>Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- END div service --}}

                    @endforeach
                </div>
            </div>

            {{-- button che al click fa comparire sezione dedicata a inserimento nuovo servizio --}}
            <div class="form-group mt-4 mb-5">
                <button v-on:click="showForm()" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Crea nuovo servizio</button>
            </div>

            {{-- nuovi servizi --}}
            <div v-if="show">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Aggiungi un nuovo servizio alla tua offerta</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.service-create') }}" method="post">
                            @csrf
                            @method('POST')
                            {{-- Nome Prestazione --}}
                            <div class="form-group">
                                <label for="service-name">Nome prestazione</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il nome del servizio">
                            </div>

                            {{-- Descrizione Prestazione --}}
                            <div class="form-group">
                                <label for="description">Descrizione la prestazione</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrivi il servizio offerto"></textarea>
                            </div>

                            {{-- Tariffa oraria --}}
                            <div class="form-group">
                                <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                                <input type="number" step="0.50" class="form-control d-inline-block" style="width: 100px;" id="hourly_rate" name='hourly_rate' placeholder="00.00" min='0.00'>
                                <label class="d-inline-block ml-1">€</label>
                            </div>
                            <button class="btn btn-success"><i class="fas fa-check mr-2"></i>Salva</button>

                        </form>

                    </div>
                </div>

            </div>
            {{-- END nuovi servizi --}}



        </div>
    </div>
    {{-- END vue container --}}
@endsection
