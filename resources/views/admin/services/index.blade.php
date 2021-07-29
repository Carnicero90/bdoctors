@extends('layouts.app')
@section('header-scripts')

    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

@endsection

@section('footer-scripts')
    <script src="{{ asset('js/services.js') }}"></script>
@endsection

@section('content')

<div class="top-margine">
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

            <div class="mb-4">
                <h1>Aggiungi o crea un servizio</h1>
            </div>

            @include('partials.success-messages')
            @include('partials.validation-errors')

            {{-- servizi gia esistenti, editabili o eliminabili --}}
            <div class="row">
                <div class="col-12 mb-4">
                    <h2>I tuoi attuali servizi</h2>
                </div>
                <div class="col-12">
                    @foreach ($services as $key => $service)
                    {{-- div service --}}
                        <div class="card mb-4 service-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h3>{{ $service->title }}</h3>
                                </div>
                                <div>
                                    <h5>€ {{ $service->hourly_rate }}/h</h5>
                                </div>
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
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}" placeholder="Inserisci il nome del servizio" :disabled="!formModify">
                                    </div>
                                    {{-- END input#name --}}

                                    {{-- input#description --}}
                                    <div class="form-group">
                                        <label for="description">Descrizione:</label>
                                        <textarea class="form-control" name="description" id="description" rows="2" placeholder="Descrivi il servizio offerto" :disabled="!formModify">{{ $service->description }}</textarea>
                                    </div>
                                    {{-- END input#description --}}

                                    {{-- input#hourly_rate --}}
                                    <div class="form-group">
                                        <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                                        <input type="number" step="0.50" class="form-control d-inline-block hourly-rate" id="hourly_rate" name="hourly_rate" placeholder="00.00" value="{{ $service->hourly_rate }}" :disabled="!formModify">
                                        <label class="d-inline-block ml-1">€</label>
                                    </div>
                                    {{-- END input#hourly_rate --}}

                                    {{-- Button Modifica Servizio --}}
                                    <div class="mt-4" v-if="!formModify">
                                        <div v-on:click="changeFormModify()" class="btn btn-outline-primary"><i class="fas fa-edit mr-2"></i>Modifica</div>
                                    </div>

                                    {{-- Button Salva Modifiche Servizio --}}
                                    <div class="mt-4" v-if="formModify">
                                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-check mr-2"></i>Salva modifiche</button>
                                    </div>

                                </form>

                                {{-- Delete --}}
                                <div class="delete-btn">
                                    <form action="{{ route('admin.service-destroy', ['id' => $service->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" onclick="return confirm('Sei sicuro di volere eliminare il tuo servizio?')"><i class="fas fa-times mr-2"></i>Elimina</button>
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
                <button v-on:click="showForm()" class="btn btn-outline-primary"><i class="fas fa-plus mr-2"></i>Crea nuovo servizio</button>
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
                            {{-- Nome Servizio --}}
                            <div class="form-group">
                                <label for="service-name">Nome servizio</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il nome del servizio">
                            </div>

                            {{-- Descrizione Servizio --}}
                            <div class="form-group">
                                <label for="description">Descrizione servizio</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrivi il servizio offerto"></textarea>
                            </div>

                            {{-- Tariffa oraria --}}
                            <div class="form-group">
                                <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                                <input type="number" step="0.50" class="form-control d-inline-block hourly-rate" id="hourly_rate" name='hourly_rate' placeholder="00.00" min='0.00'>
                                <label class="d-inline-block ml-1">€</label>
                            </div>
                            <button class="btn btn-outline-success"><i class="fas fa-check mr-2"></i>Salva</button>

                        </form>

                    </div>
                </div>

            </div>
            {{-- END nuovi servizi --}}



        </div>
    </div>
    {{-- END vue container --}}
</div>    

@endsection
