<div class="row dash-list d-flex text-center align-items-center">
    {{-- TOASK: che roba e'? --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- Crea/Modifica Profilo --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3 zoom">
        <a class="dash-link" href="{{ route('admin.profile-index') }}">
            <img src="{{asset("img/dashboard/modifica.png")}}" alt="" class="img_30 mb-2">
            <div>{{ Auth::user()->profile ? 'Modifica' : 'Crea' }} profilo</div>
        </a>
    </div>

    {{-- Aggiungi/Modifica Servizio --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3 zoom">
        <a class="dash-link" href="{{ route('admin.services') }}">
            <img src="{{asset("img/dashboard/servizi.png")}}" alt="" class="img_30 mb-2">
            <div>Servizi</div>
        </a>
    </div>

    {{-- Visualizza Profilo Pubblico --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3 zoom">
        <a class="dash-link" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
            <img src="{{asset("img/dashboard/profilo.png")}}" alt="" class="img_30 mb-2">
            <div>Profilo pubblico</div>
        </a>
    </div>

    {{-- Statistiche --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3 zoom">
        <a class="dash-link" href="{{ route('admin.reviews') }}">
            <img src="{{asset("img/dashboard/recensioni.png")}}" alt="" class="img_30 mb-2">
            <div>Recensioni</div>
        </a>
    </div>

    {{-- Statistiche --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3 zoom">
        <a class="dash-link" href="{{ route('admin.messages') }}">
            <img src="{{asset("img/dashboard/messaggi.png")}}" alt="" class="img_30 mb-2">
            <div>Messaggi</div>
        </a>
    </div>

    {{-- Statistiche --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3 zoom">
        <a class="dash-link" href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}">
            <img src="{{asset("img/dashboard/statistiche.png")}}" alt="" class="img_30 mb-2">
            <div>Statistiche</div>
        </a>
    </div>

</div>