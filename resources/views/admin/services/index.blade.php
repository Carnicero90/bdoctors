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

            <div class="mb-4">
                <h1>Aggiungi o crea una prestazione</h1>
            </div>
    
            @foreach ($services as $service)
                <div class="card mb-4" style="height: 330px;">
                    <div class="card-body" style="padding: 0 20px;">
                        <form action="{{ route('admin.service-update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}">
                            </div>
                            {{-- END input#name --}}
    
                            {{-- input#description --}}
                            <div class="form-group">
                                <label for="description">Descrivi la prestazione</label>
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
    
                            <button class="btn btn-success"><i class="fas fa-check mr-2"></i>Salva modifiche</button>
                        </form>
                        
                        {{-- Delete --}}
                        <div class="text-right" style="transform: translateY(-38px);">
                            <form action="{{ route('admin.service-destroy', ['id' => $service->id ]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-times mr-2"></i>Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="card mb-4" style="height: 300px;">
                <div class="card-body">
                    {{-- OLD Prestazione --}}
                    {{-- Nome Prestazione --}}
                    <div class="form-group">
                        <label for="service-name">Nome prestazione</label>
                        <input type="text" class="form-control" id="title" :name="'service' + number + '[title]'" placeholder="Inserisci il nome del servizio">
                    </div>
        
                    {{-- Descrizione Prestazione --}}
                    <div class="form-group">
                        <label for="description">Descrizione la prestazione</label>
                        <textarea class="form-control" :name="'service' + number + '[description]'" id="description" rows="3" placeholder="Descrivi il servizio offerto"></textarea>
                    </div>
        
                    {{-- Tariffa oraria --}}
                    <div class="form-group">
                        <label for="hourly_rate" class="d-inline-block mr-1">Tariffa oraria</label>
                        <input type="number" step="0.50" class="form-control d-inline-block" style="width: 100px;" id="hourly_rate" :name="'service' + number + '[hourly_rate]'" placeholder="00.00" min='0.00'>
                        <label class="d-inline-block ml-1">€</label>
                    </div>
                </div>
            </div>

            {{-- Aggiungere singola prestazione --}}
            <div class="form-group">
                <button v-on:click="numbers++" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Aggiungi prestazione</button>
            </div>
        </div>
    </div>
@endsection

