@extends('layouts.app')
@section('content')

    <div class="container">

        @include("partials.success-messages")
        @include("partials.validation-errors")

        {{-- form profile --}}
        <form action="{{ route('admin.profile-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")

            {{-- input#work_address --}}
            <div class="form-group mt-4 mb-4">
                <label for="work_address">Indirizzo/Luogo di Lavoro</label>
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


            {{-- input#self_description --}}
            <div class="form-group mt-4 mb-4">
                <label for="self_description">Descriviti</label>
                <textarea class="form-control" name="self_description" id="self_description" rows="10"
                    placeholder="Scrivi una descrizione per il tuo profilo">{{ Auth::user()->profile ? Auth::user()->profile->self_description : old('self_description') }}</textarea>
            </div>
            {{-- END input#self_description --}}

            {{-- input#image-file --}}
            <div class="form-group mt-4 mb-4">
                <label for="image-file">Carica un'immagine profilo</label>
                <input type="file" class="form-control-file" id="image-file" name="image-file">
            </div>
            {{-- END input#image-file --}}

            <button type="submit" class="btn btn-primary mt-4">
                @if (Auth::user()->profile)
                    Salva modifiche
                @else
                    Crea profilo
                @endif
            </button>

        </form>
        {{-- END form profile --}}


    </div>

@endsection
