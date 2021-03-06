{{-- HEADER --}}
<header class="julius-font">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <ul class="navbar-nav left-menu align-items-center">
                <li class="nav-item">
                    <a class="navbar-brand logo" href="/">
                        <img src="{{ asset('img/logos/boolbards-logo-white.png') }}" alt="Logo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">
                        Categorie
                    </a>
                </li>
            </ul>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="navbar" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ Auth::user()->name }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav> 
</header>
<script type="text/javascript">
    window.addEventListener('scroll', function() {
        let header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>
    

