@extends('layouts.app')

@section('content')
    
    <div class="container">
        <form action="{{ route('store-message') }}" method="post" enctype="multipart/form-data" class="form_class">
            {{-- form_method == GET se  @method == GET, in ogni altro caso: form_method == PUT --}}
            @csrf {{-- TOREMOVE: OBBLIGATORIO --}}
            @method('POST')
        
            {{-- input#input_labelled --}}
            <div class="form_group_class">
                <label for="author_name">Autore</label>
                <input type="text" class="input_class" id="author_name" name="author_name"
                    value="" required>
            </div>
            {{-- END input.input_labelled --}}
        
            {{-- input#input_labelled --}}
            <div class="form_group_class">
                <label for="author_email">Email</label>
                <input type="email" class="input_class" id="author_email" name="author_email"
                    value="" required>
            </div>
            {{-- END input.input_no_label --}}

            {{-- TextArea --}}
            <div class="form_group_class">
                <label for="text">Messaggio</label>
                <textarea name="text" id="text" cols="30" rows="10" required></textarea>
            </div>
            {{-- END TextArea --}}
        
            <button type="submit" class="form_button_class">Invia Messaggio</button>
        </form>
    </div>
    
@endsection