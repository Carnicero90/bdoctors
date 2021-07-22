@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <h1>Recensioni</h1>

        <div class="row">
            @if ($reviews->isNotEmpty())
                @foreach ($reviews as $review)
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
                                <div class="mt-2 mb-3">
                                    <p class="card-text text-secondary">{{$review->content}}</p>
                                </div>
                                <div><a href="{{route("admin.reviews-dettails", ["id" => $review->id])}}" class="btn btn-primary"><i class="far fa-file-alt mr-2"></i>Leggi</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 mt-3">
                    <span>Nessuna recensione presente</span>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection