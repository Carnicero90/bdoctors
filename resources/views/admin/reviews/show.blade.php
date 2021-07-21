@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <h1>Recensione</h1>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="mt-2 mb-2"><h4><small>da </small>{{$review->author_name}}</h4></div>
                        <div class="mt-2 mb-2"><h6><i class="fas fa-envelope mr-2"></i>{{$review->author_email}}</h6><span></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-secondary mr-1">voto:</span>
                                @for ($i = 0; $i < $review->vote->value; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <div class="mt-2 mb-2 text-secondary">ricevuta il {{ $review->send_date }}</div>
                        </div>
                        <div class="mt-2 mb-2">
                            <span>Testo recensione:</span>
                            <p class="card-text text-secondary">{{$review->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection