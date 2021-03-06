@extends('layouts.app')

@section('header-scripts')

    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    {{-- Dayjs --}}
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>

@endsection
@section('footer-scripts')
    <script src="{{ asset('js/show.js') }}"></script>
@endsection

@section('content')

    <div class="top-margine">
        {{-- div#root --}}
        <div id="root">

            <input type="hidden" id="userid" value="{{ $user->id }}">

            <div class="container text-center">
                @include("partials.success-messages")
                @include("partials.error-messages")
            </div>
            <div class="container">

                {{-- img profilo --}}
                <div class="row mb-4 d-flex align-items-center">
                    @if ($user->profile)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
                            <div class="profile-img-dashboard-container">
                                <img src="{{ asset('storage/' . $user->profile->pic) }}" alt="{{ $user->name . ' ' . $user->lastname }}" class="profile-img-dashboard">
                            </div>
                        </div>
                    @else
                    <div class="col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
                        <div class="profile-img-dashboard-container">
                            <img src="{{ asset('img/user/user-img.png') }}" alt="" class="profile-img-dashboard">
                        </div>
                    </div>
                    @endif
                    {{-- nome profilo --}}
                    <div class="col-12 col-sm-12 col-md-9 col-lg-10 col-xl-10 text-center text-sm-center text-md-left text-xl-left mb-3 mt-4">
                        <div>
                            <h1>{{ $user->name }} {{ $user->lastname }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                {{-- INFO personali --}}
                <div class="mb-4">
                    @foreach ($user->categories as $category)
                        <a class="btn btn-outline-dark profile-badge-category text-white" href="{{ route('category-page', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                    @endforeach
                </div>

                <div class="mb-4">
                    <h5 class="profile-title"><i class="fas fa-envelope mr-2"></i>Email:</h5>
                    <span class="text-gray">{{$user->email}}</span>
                </div>


                <div class="mb-4">
                    <h5 class="profile-title"><i class="fas fa-map-marked-alt mr-2"></i>Indirizzo:</h5>
                    @if ($user->profile)
                        <span class="text-gray">{{$user->profile->work_address}}</span>
                    @else
                        <span class="text-gray">Nessun indirizzo di lavoro impostato</span>
                    @endif
                </div>

                <div class="mb-4">
                    <h5 class="profile-title"><i class="fas fa-file-alt mr-2"></i>Vi parlo di me:</h5>
                    @if ($user->profile)
                        <p class="text-gray">{{$user->profile->self_description}}</p>
                    @else
                        <span class="text-gray">Nessuna descrizione presente</span>
                    @endif
                </div>
                {{-- END INFO personali --}}
            </div>

            <div class="container">
                @if (!(Auth::user() && $user->id == Auth::user()->id))
                    <div class="mt-4">
                        {{-- link form recensioni --}}
                        <a href="{{ route('send-review', ['id' => $user->id]) }}" class="btn btn-outline-primary mr-3">Scrivi recensione</a>
                        {{-- link form messaggi --}}
                        <a href="{{ route('send-message', ['id' => $user->id]) }}" class="btn btn-outline-primary mr-3">Scrivi messaggio</a>
                    </div>
                @endif
            </div>

            <hr>

            <div class="container">
                {{-- SERVICES --}}
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h2>Servizi</h2>
                    </div>
                    @if ($user->services->isNotEmpty())
                        @foreach ($user->services as $service)
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h4>{{$service->title}}</h4>
                                        <h5>??? {{$service->hourly_rate}}/h</h5>
                                    </div>
                                    <div class="card-body text-gray">
                                        <p>{{$service->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <span class="text-gray">Nessun servizio disponibile al momento</span>
                        </div>
                    @endif
                </div>
                {{-- END SERVICES --}}
            </div>

            <hr>

            <div class="container">
                {{-- reviews --}}
                <div class="row mb-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h2>Recensioni</h2>
                    </div>
                    <div v-if="reviews.length == 0" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                        <span class="text-gray">Nessuna recensione presente</span>
                    </div>
                    <div v-else v-for="review in reviews.slice(0, reviews_to_show)" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between">
                                <div class="mr-5">
                                    <span>@{{review.author_name}}</span>
                                </div>
                                <div>
                                    <span>@{{review.author_email}}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <span>voto: </span>
                                        <span v-for="n in review.value">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <span>@{{dayjs(review.send_date).format('D/MM/YYYY')}}</span>
                                    </div>
                                </div>
                                <div class="mt-2 mb-2">
                                    <p class="text-gray">@{{review.content}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="reviews.length > 5" class="mt-4 mb-5">
                    <button v-on:click="reviews_to_show += reviews_to_show"class="btn btn-outline-primary">Mostra piu recensioni</button>
                </div>
                {{-- END reviews --}}
            </div>

        </div>
        {{-- END div#root --}}

    </div>

@endsection
