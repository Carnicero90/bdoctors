@extends('layouts.app')
@section('content')

<div class="top-margine">

    <div class="container">
        
        {{-- HEADER --}}
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="dashboard">
                    @include('partials.dashboard-nav')
                </div>
            </div>
        </div>
        {{-- END HEADER --}}

        <h1>Recensioni</h1>

        <div class="row mb-5">
            @if ($reviews->isNotEmpty())
                @foreach ($reviews as $review)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mt-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-2 mb-2"><h4>{{$review->author_name}}</h4></div>
                                <div class="mt-2 mb-2"><h6>{{$review->author_email}}</h6><span></div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="mr-1">voto:</span>
                                        @for ($i = 0; $i < $review->vote->value; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                    <div class="mt-2 mb-2">{{date("d/m/Y", strtotime($review->send_date))}}</div>
                                </div>
                                <div class="mt-2 mb-3">
                                    <p class="card-text">
                                        @if (strlen($review->content) > 133)
                                            {{substr($review->content, 0, 130) . "..."}}
                                        @else
                                            {{$review->content}}
                                        @endif
                                    </p>
                                </div>
                                <div><a href="{{route("admin.reviews-dettails", ["id" => $review->id])}}" class="btn btn-outline-primary"><i class="far fa-file-alt mr-2"></i>Leggi</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 mt-3">
                    <span class="text-secondary">Nessuna recensione presente</span>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection