{{-- HEADER --}}
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <ul class="navbar-nav ml-auto left-menu">
                <li class="nav-item">
                    <a class="navbar-brand logo" href="/">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo">
                    </a>
                </li>
                <li class="nav-item">
                    {{-- TODO : Rendere responsive --}}
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    {{-- TODO : Rendere responsive --}}
                    <a class="nav-link" href="{{ route('categories') }}">
                        Categorie
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('admin.profile-index')}}">Crea / Modifica profilo privato</a>

                                <a class="dropdown-item" href="{{route("profile", ['id' => Auth::user()->id])}}">Visualizza profilo pubblico</a>

                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Vai alla Dashboard</a>

                                <a class="dropdown-item" href="{{ route('admin.messages') }}">Leggi i tuoi messaggi</a>

                                <a class="dropdown-item" href="{{ route('admin.reviews') }}">Leggi recensioni lasciate per te</a>

                                <a class="dropdown-item" href="{{ route('sponsor-index') }}">Acquista un piano Premium</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ "Esegui " . __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="min-height: calc(100vh - 87px);">
        @yield('content')
    </main>
</div>