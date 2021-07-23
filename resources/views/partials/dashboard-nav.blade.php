<div class="row dash-list d-flex text-center align-items-center">
    {{-- TOASK: che roba e'? --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- Crea/Modifica Profilo --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3">
        <a class="dash-link" href="{{ route('admin.profile-index') }}">
            <div>{{ Auth::user()->profile ? 'Modifica' : 'Crea' }} profilo</div>
        </a>
    </div>

    {{-- Aggiungi/Modifica Servizio --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3">
        <a class="dash-link" href="{{ route('admin.services') }}">
            <div>Servizi</div>
        </a>
    </div>

    {{-- Statistiche --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3">
        <a class="dash-link" href="{{ route('admin.reviews') }}">
            <div>Recensioni</div>
        </a>
    </div>

    {{-- Statistiche --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3">
        <a class="dash-link" href="{{ route('admin.messages') }}">
            <div>Messaggi</div>
        </a>
    </div>

    {{-- Statistiche --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3">
        <a class="dash-link" href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}">
            <div>Statistiche</div>
        </a>
    </div>

    {{-- Visualizza Profilo Pubblico --}}
    <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 mb-3">
        <a class="dash-link" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
            <div>Profilo pubblico</div>
        </a>
    </div>

</div>