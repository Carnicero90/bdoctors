<div class="dash-list d-flex text-center align-items-center">
    {{-- TOASK: che roba e'? --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- Crea/Modifica Profilo --}}
    <a class="dash-link" href="{{ route('admin.profile-index') }}">
        <i class="fas fa-user-cog mb-2 dashboard-icon"></i>
        <div>{{ Auth::user()->profile ? 'Modifica' : 'Crea' }} profilo</div>
    </a>

    {{-- Aggiungi/Modifica Servizio --}}
    <a class="dash-link" href="{{ route('admin.services') }}">
        <i class="fas fa-user-plus mb-2 dashboard-icon"></i>
        <div>Aggiungi / Modifica servizio</div>
    </a>

    {{-- Statistiche --}}
    <a class="dash-link" href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}">
        <i class="far fa-comment-dots mb-2 dashboard-icon"></i>
        <div>Recensioni</div>
    </a>

    {{-- Statistiche --}}
    <a class="dash-link" href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}">
        <i class="far fa-envelope mb-2 dashboard-icon"></i>
        <div>Messaggi</div>
    </a>

    {{-- Statistiche --}}
    <a class="dash-link" href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}">
        <i class="fas fa-signal mb-2 dashboard-icon"></i>
        <div>Statistiche</div>
    </a>

    {{-- Visualizza Profilo Pubblico --}}
    <a class="dash-link" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
        <i class="fas fa-user-tie mb-2 dashboard-icon"></i>
        <div>Visualizza profilo pubblico</div>
    </a>

</div>