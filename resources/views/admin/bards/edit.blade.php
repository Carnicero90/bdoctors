@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica il profilo</h1>

        <div class="row">
            <div class="col-6">

            {{-- inizio edit form --}}
            <form action="" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="Indirizzo">Indirizzo</label>
                    <input type="text" class="form-control" id="Indirizzo" name="title" value="">
                </div>

                <div class="form-group">
                    <label for="Telefono">Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="title" value="">
                </div>

                <div class="form-group">
                    <label for="content">Modifica il curricumul Vitae</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">  </textarea>
                </div>

                <div class="form-check mt-5">
                    <h4>Gestisci le categorie</h4>

                    {{--Singolo input--}}
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Chitarrista
                    </label>
                    <br>

                    {{--Singolo input--}}
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Bassista
                    </label>
                    <br>

                    {{--Singolo input--}}
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck3">
                        Cantante
                    </label>
                    <br>

                    {{--Singolo input--}}
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                    <label class="form-check-label" for="defaultCheck4">
                        Batterista
                    </label>
                    <br>

                    {{--Singolo input--}}
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                    <label class="form-check-label mb-5" for="defaultCheck5">
                        Tastierista
                    </label>
                </div>

                <input type="submit" class="btn btn-success" value="Salva le modifiche">
            </form>
            {{-- fine Edit form --}}
                
            </div>
        </div>
    </div>
@endsection