@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <div class="row mb-4">
            <h3>{{ucfirst($category->name)}}</h3>
        </div>

        <div class="row mt-4 d-flex align-items-center justify-content-between">
            @foreach ($category_users as $user)
                <div class="col-3">
                    @include("partials.user-card-php")
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection