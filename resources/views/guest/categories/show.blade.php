@extends('layouts.app')
@section('content')

{{-- Jumbotron --}}
<div style="background-image: url({{ asset('/img/categories_img_jumbo/' . config('categories.' . $category->slug . '.img')) }})" class="cat-jumbotron d-flex align-items-center justify-content-center">
    <h1 class="text-center">{{ $category->name }}</h1>
</div>

<div class="top-margine">
    <div class="container">

        <div class="row mt-4 d-flex align-items-center justify-content-center">
            @foreach ($category_users as $user)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    @include("partials.user-card-php")
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection