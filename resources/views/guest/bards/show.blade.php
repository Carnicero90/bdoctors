@extends('layouts.app')

@section('header-scripts')
    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
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
                        <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                            <div class="profile-img-dashboard-container">
                                <img src="{{ asset('storage/' . $user->profile->pic) }}"
                                    alt="{{ $user->name . ' ' . $user->lastname }}" class="profile-img-dashboard">
                            </div>
                        </div>
                    @else
                    <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                        <div class="profile-img-dashboard-container col-12 col-sm-12">
                            <img src="{{ asset('img/user-img.png') }}" alt="" class="profile-img-dashboard">
                        </div>
                    </div>
                    @endif
                    {{-- nome profilo --}}
                    <div class="col-12 col-sm-12 col-md-9 col-lg-10">
                        <div>
                            <h1>{{ $user->name }} {{ $user->lastname }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                {{-- INFO personali --}}
                <div class="mb-4">
                    @foreach ($user->categories as $category)
                        <a class="btn btn-outline-dark profile-badge-category"
                            href="{{ route('category-page', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                    @endforeach
                </div>

                <div class="mb-4">
                    <h6>Email:</h6>
                    <span>{{ $user->email }}</span>
                </div>


                <div class="mb-4">
                    <h6>Indirizzo:</h6>
                    @if ($user->profile)
                        <span>{{ $user->profile->work_address }}</span>
                    @endif
                </div>

                <div class="mb-4">
                    <h6>Vi parlo di me:</h6>
                    @if ($user->profile)
                        <p>{{ $user->profile->self_description }}</p>
                    @endif
                </div>
                {{-- END INFO personali --}}
            </div>

            <div class="container">
                @if (!(Auth::user() && $user->id == Auth::user()->id))
                    <div class="mt-4">
                        {{-- link form recensioni --}}
                        <a href="{{ route('send-review', ['id' => $user->id]) }}" class="btn btn-outline-primary mr-3">Scrivi
                            recensione</a>
                        {{-- link form messaggi --}}
                        <a href="{{ route('send-message', ['id' => $user->id]) }}" class="btn btn-outline-primary mr-3">Scrivi
                            messaggio</a>
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
                    @foreach ($user->services as $service)
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4>{{ $service->title }}</h4>
                                    <h5>€ {{ $service->hourly_rate }} all'ora</h5>
                                </div>
                                <div class="card-body">
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <div v-for="review in reviews.slice(0, reviews_to_show)" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between">
                                <div class="mr-5">
                                    <span>@{{ review.author_name }}</span>
                                </div>
                                <div>
                                    <span>@{{ review.author_email }}</span>
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
                                        <span>@{{ review.send_date }}</span>
                                    </div>
                                </div>
                                <div class="mt-2 mb-2">
                                    <p class="card-text">@{{ review.content }}</p>
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
