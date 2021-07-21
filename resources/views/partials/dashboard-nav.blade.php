<div class="dash-list d-flex text-center align-items-center">
    {{-- TOASK: che roba e'? --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- Crea/Modifica Profilo --}}
    <a class="dash-link hover-blue" href="{{ route('admin.profile-index') }}">
        <i class="fas fa-user-cog mb-2 dashboard-icon"></i>
        <div>{{ Auth::user()->profile ? 'Modifica' : 'Crea' }} profilo</div>
    </a>

    {{-- Aggiungi/Modifica Servizio --}}
    <a class="dash-link hover-blue" href="{{ route('admin.services') }}">
        <i class="fas fa-user-plus mb-2 dashboard-icon"></i>
        <div>Aggiungi / Modifica servizio</div>
    </a>

    {{-- Acquista Piano Premium --}}
    <a class="dash-link hover-blue" href="{{ route('sponsor-index') }}">
        <i class="fas fa-star mb-2 dashboard-icon"></i>
        <div>Acquista piano premium</div>
    </a>

    {{-- Statistiche --}}
    <a class="dash-link hover-blue" href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}">
        <i class="fas fa-signal mb-2 dashboard-icon"></i>
        <div>Statistiche</div>
    </a>

    {{-- Visualizza Profilo Pubblico --}}
    <a class="dash-link hover-blue" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
        <i class="fas fa-user-tie mb-2 dashboard-icon"></i>
        <div>Visualizza profilo pubblico</div>
    </a>

    {{-- Logout --}}
    <a class="dash-link hover-blue" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt mb-2 dashboard-icon"></i>
        <div>Logout</div>
    </a>

</div>