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
    <div id="root">
        <div class="container">

            <div class="mb-4">
                <h1>Aggiungi o crea una prestazione</h1>
            </div>
            @include('partials.success-messages')
            @include('partials.validation-errors')

            @foreach ($services as $service)
                <div class="card mb-4" style="height: 330px;">
                    <div class="card-body" style="padding: 0 20px;">
                        <form action="{{ route('admin.service-update', ['id' => $service->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            {{-- input#user_id --}}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $service->id }}">
                            </div>
                            {{-- END input#user_id --}}

                            {{-- input#name --}}
                            <div class="form-group">
                                <label for="title">Nome prestazione</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $service->title }}">
                            </div>
                            {{-- END input#name --}}

                            {{-- input#description --}}
                            <div class="form-group">
                                <label for="description">Descrivi la prestazione</label>
                                <textarea class="form-control" name="description" id="description" rows="2"
                                    placeholder="Descrivi il servizio">{{ $service->description }}</textarea>
                            </div>
                            {{-- END input#description --}}

                            {{-- input#hourly_rate --}}
                            <div class="form-group">
                                <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                                <input type="number" step="0.50" class="form-control d-inline-block" id="hourly_rate"
                                    name="hourly_rate" value="{{ $service->hourly_rate }}" style="width: 100px;">
                                <label class="d-inline-block ml-1">€</label>
                            </div>
                            {{-- END input#hourly_rate --}}

                            {{-- Button Modifica Prestazione --}}
                            <button type="submit" class="btn btn-success">Modifica Prestazione</button>

                        </form>

                        {{-- Delete --}}
                        <div class="text-right">
                            <form action="{{ route('admin.service-destroy', ['id' => $service->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-times mr-2"></i>Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="card mb-4" v-if="show == true" style="height: 300px;">
                <form action="{{ route('admin.service-create') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        {{-- OLD Prestazione --}}
                        {{-- Nome Prestazione --}}
                        <div class="form-group">
                            <label for="service-name">Nome prestazione</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Inserisci il nome del servizio">
                        </div>

                        {{-- Descrizione Prestazione --}}
                        <div class="form-group">
                            <label for="description">Descrizione la prestazione</label>
                            <textarea class="form-control" name="description" id="description"
                                rows="3" placeholder="Descrivi il servizio offerto"></textarea>
                        </div>

                        {{-- Tariffa oraria --}}
                        <div class="form-group">
                            <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                            <input type="number" step="0.50" class="form-control d-inline-block" style="width: 100px;"
                                id="hourly_rate" name='hourly_rate' placeholder="00.00"
                                min='0.00'>
                            <label class="d-inline-block ml-1">€</label>
                        </div>
                    </div>
                    <button class="btn btn-success">Invia</button>
                </form>
            </div>

            {{-- Aggiungere singola prestazione --}}
            <div class="form-group">
                <button v-on:click="showForm()" class="btn btn-primary"><i
                        class="fas fa-plus"></i></button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Aggiungi prestazione</button>
            </div>
        </div>
    </div>
@endsection
