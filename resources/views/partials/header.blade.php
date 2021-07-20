{{-- HEADER --}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <ul class="navbar-nav left-menu" style="align-items: center">
                <li class="nav-item">
                    <a class="navbar-brand logo" href="/">
                        <img src="{{ asset('img/boolbards-logo-black-1.png') }}" alt="Logo">
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
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- TO REMEMBER: rimosso v-pre in fondo a tag precedente, non dovrebbe contare --}}
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-user-edit mr-2"></i>Dashboard</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-2"></i>{{ "Esegui " . __('Logout') }}</a>

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

