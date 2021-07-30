@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <h1>Recensione</h1>

        <div class="row">
            <div class="col-12">
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
                            <div class="mt-2 mb-2">{{date("d/m/y", strtotime($review->send_date))}}</div>
                        </div>
                        <div class="mt-2 mb-2">
                            <p class="text-gray">{{$review->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection