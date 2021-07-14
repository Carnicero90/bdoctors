@extends('layouts.app')
@section('content')

<div class="container">
    
    <div>
        <h3>{{ucfirst($category->name)}}</h3>
    </div>

    <h4>Lista utenti della categoria:</h4>
    <ul>
        {{-- @foreach ($categories as $category)
        <li>
            <div class="mb-4">
                {{$category->name}}
                <a href="{{route("category-page", ["slug" => $category->slug])}}" class="btn btn-primary">Visualizza gli artisti della categoria</a>
            </div>
        </li>  
    @endforeach --}}
    </ul>
</div>

@endsection