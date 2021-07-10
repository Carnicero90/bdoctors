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

                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select class="form-control" name="category_id" id="category_id">

                        <option value="">Nessuna</option>
                        
                        <option value="chitarrista" >chitarrista</option>

                        <option value="bassista" >bassista</option>

                        <option value="chitarrista" >chitarrista</option>
                        
                    </select>
                </div>

                <input type="submit" class="btn btn-success" value="Salva le modifiche">
            </form>
            {{-- fine Edit form --}}
                
            </div>
        </div>
    </div>
@endsection