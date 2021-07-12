@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- form profile --}}
        <form action="" method="post" enctype="multipart/form-data">

            @csrf
            @method("POST")

            {{-- input#work_address --}}
            <div class="form-group mt-4 mb-4">
                <label for="work_address">Indirizzo/Luogo di Lavoro</label>
                <input type="text" class="form-control" id="work_address" name="work_address"
                    placeholder="Inserisci il tuo indirizzo" value="{{ Auth::user()->userDetails ? Auth::user()->userDetails->work_address : old('work_address') }}">
            </div>
            {{-- END input#work_address --}}

            {{-- input#phone_number --}}
            <div class="form-group mt-4 mb-4">
                <label for="phone_number">Numero di telefono</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                    placeholder="Inserisci il tuo numero di telefono" value="{{ Auth::user()->userDetails ? Auth::user()->userDetails->phone_number : old('phone_number') }}"
                    pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
            </div>

            {{-- input#self_description --}}
            <div class="form-group mt-4 mb-4">
                <label for="self_description">Descriviti</label>
                <textarea class="form-control" name="self_description" id="self_description" rows="10"
                    placeholder="Scrivi la recensione">{{ old('self_description') }}</textarea>
            </div>
            {{-- END input#self_description --}}

            {{-- input#pic --}}
            <div class="form-group mt-4 mb-4">
                <label for="pic">Carica un'immagine profilo</label>
                <input type="file" class="form-control" id="pic" name="pic"
                    placeholder="Inserisci il tuo numero di telefono" value="{{ old('pic') }}">
            </div>
            {{-- END input#pic --}}


            {{-- tasto per inviare recensione --}}
            <button type="submit" class="btn btn-primary mt-4">
                Invia
            </button>

        </form>
        {{-- END form profile --}}


    </div>

@endsection
