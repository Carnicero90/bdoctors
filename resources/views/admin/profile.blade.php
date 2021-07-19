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

            {{-- HEADER --}}
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="dashboard">
                        @include('partials.dashboard-nav')
                    </div>
                </div>
            </div>
            {{-- END HEADER --}}

            <div class="mt-3 mb-3">
                <h1>Modifica profilo</h1>
            </div>

            @include("partials.success-messages")
            @include("partials.validation-errors")

            {{-- form profile --}}
            <form action="{{ route('admin.profile-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")

                {{-- input#image-file --}}
                <img v-bind:src="preload" alt="" style="max-height:300px">
                <div class="form-group">
                    <label for="image-file">Carica un'immagine profilo</label>
                    <input type="file" v-on:change="preloadPic($event)" class="form-control-file" id="image-file" name="image-file">
                </div>
                {{-- END input#image-file --}}
                {{-- input#work_address --}}
                <div class="form-group mt-4 mb-4">
                    <label for="work_address">Indirizzo / Luogo di Lavoro</label>
                    <input type="text" class="form-control" id="work_address" name="work_address" placeholder="Inserisci il tuo indirizzo" value="{{ Auth::user()->profile ? Auth::user()->profile->work_address : old('work_address') }}">
                </div>
                {{-- END input#work_address --}}

                {{-- input#phone_number --}}
                <div class="form-group mt-4 mb-4">
                    <label for="phone_number">Numero di telefono</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Inserisci il tuo numero di telefono" value="{{ Auth::user()->profile ? Auth::user()->profile->phone_number : old('phone_number') }}">
                </div>
                {{-- END input#phone_number --}}

                {{-- TODO --}}
                {{-- check-box#categories --}}
                <div class="form-group">
                    <label for="categories" class="d-block">Scegli le tue categorie</label>
                    @foreach ($categories as $category)
                        <div class="form-check d-inline-block mr-5 mb-2">
                            <input value="{{ $category->id }}" class="form-check-input" id="categories-{{ $category->id }}" name="categories[]" type="checkbox"
                                {{ Auth::user()->categories->contains($category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="categories-{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
                {{-- END check-box#categories --}}
                {{-- END TODO --}}


                {{-- input#self_description --}}
                <div class="form-group mt-4 mb-4">
                    <label for="self_description">Descriviti</label>
                    <textarea class="form-control" name="self_description" id="self_description" v-bind:rows="lines" v-on:keyup.enter="lines ++" placeholder="Scrivi una descrizione per il tuo profilo">{{ Auth::user()->profile ? Auth::user()->profile->self_description : old('self_description') }}</textarea>
                </div>
                {{-- END input#self_description --}}
                @if (Auth::user()->profile)
                    <button type="submit" class="btn btn-success"><i class="fas fa-check mr-2"></i>Salva modifiche</button>
                @else
                    <button type="submit" class="btn btn-success"><i class="fas fa-user-check mr-2"></i>Crea profilo</button>
                @endif
                {{-- END bottone per invio form --}}

            </form>
            {{-- END form profile --}}

        </div>

    </div>
    {{-- END vue container --}}

@endsection
