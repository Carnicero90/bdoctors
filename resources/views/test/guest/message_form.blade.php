@extends('layouts.app')
@section('content')
    
{{-- form.form_class --}}
<form action="{{ route('/') }}" method="form_method" enctype="multipart/form-data" class="form_class">
    {{-- form_method == GET se  @method == GET, in ogni altro caso: form_method == PUT --}}
    @csrf {{-- TOREMOVE: OBBLIGATORIO --}}
    @method('PUT')

    {{-- input#input_labelled --}}
    <div class="form_group_class">
        <label for="input_labelled">Titolo</label>
        <input type="input_labelled_type" class="input_class" id="input_labelled" name="input_labelled"
            value="{{ value }}">
    </div>
    {{-- END input.input_labelled --}}

    {{-- input#input_no_label --}}
    <div class="form_group_class">
        <input type="input_no_label_type" class="input_class" id="input_no_label" name="input_no_label"
            aria-label="Titolo" value="{{ value }}">
                {{-- TOREMOVE: mancando elemento label, lo labelliamo via tag per ragioni di accessibilità --}}
    </div>
    {{-- END input.input_no_label --}}

    <button type="submit" class="form_button_class">Testo</button>
</form>
{{-- END.form.form_class --}}
@endsection