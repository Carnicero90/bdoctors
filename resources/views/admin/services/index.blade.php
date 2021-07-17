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
    <div class="root">
        <div class="container">
            <h1>Aggiungi o crea una prestazione</h1>
    
                @foreach ($services as $service)
                    <form action="{{ route('admin.service-update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            {{-- input#user_id --}}
                            <input type="hidden" name="id" value="{{ $service->id }}">
                        </div>
                        {{-- END input#user_id --}}

                        {{-- input#name --}}
                        <div class="form-group mt-4 mb-4">
                            <label for="title">Nome servizio</label>
                            <input type="text" class="form-control-file" id="title"
                                name="title" value="{{ $service->title }}">
                        </div>
                        {{-- END input#name --}}

                        {{-- input#description --}}
                        <div class="form-group mt-4 mb-4">
                            <label for="description">Descrivila</label>
                            <textarea class="form-control" name="description"
                                id="description" rows="3"
                                placeholder="Descrivi il servizio">{{ $service->description }}</textarea>
                        </div>
                        {{-- END input#description --}}

                        {{-- input#hourly_rate --}}
                        <div class="form-group mt-4 mb-4">
                            <label for="hourly_rate">Tariffa oraria</label>
                            <input type="number" step="0.10" class="form-control" id="hourly_rate"
                                name="hourly_rate"
                                value="{{ $service->hourly_rate }}">
                        </div>
                        {{-- END input#hourly_rate --}}

                        <button class="btn btn-warning mb-2">Salva modifiche</button>
                    </form>
                    
                    {{-- Delete --}}
                    <form action="{{ route('admin.service-destroy', ['id' => $service->id ]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Elimina</button>
                    </form>

                @endforeach

                <div class="card">

                </div>
                {{-- OLD Prestazione --}}
                {{-- Nome Prestazione --}}
                <div class="form-group mt-4">
                    <label for="service-name">Nome Prestazione</label>
                    <input type="text" 
                           class="form-control"
                           id="title" 
                           :name="'service' + number + '[title]'"
                           placeholder="Inserisci il nome del servizio">
                </div>
    
                {{-- Descrizione Prestazione --}}
                <div class="form-group mt-4 mb-4">
                    <label for="description">Descrizione servizio</label>
                    <textarea class="form-control" :name="'service' + number + '[description]'" id="description"
                        rows="3" placeholder="Descrivi il servizio offerto"></textarea>
                </div>
    
                {{-- Tariffa oraria --}}
                <div class="form-group mt-4">
                    <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                    <input type="number" step="0.50" class="form-control d-inline-block" style="width: 100px;"
                        id="hourly_rate" :name="'service' + number + '[hourly_rate]'" placeholder="00.00"
                        min='0.00'>
                    <label class="d-inline-block ml-1">€</label>
                </div>

                {{-- Aggiungere singola prestazione --}}
                <div class="form-group mt-4">
                    <button v-on:click="numbers++" class="btn btn-danger">+</button>
                </div>
                
                <button type="submit" class="btn btn-primary">Aggiungi prestazione</button>
        </div>
    </div>
@endsection

