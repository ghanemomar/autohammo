<nav>
    <a href="{{ url('/')}}" class="logo"><img src="{{ URL('/logos/logo.webp') }}" alt="Logo"></a>
    <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="{{route("home")}}">Home</a></li>
            <li><a href="#services">Services</a></li>
           
            <li><a href="#footer">Contact us</a>
        </ul>
        <div class="header-btn">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}">Se connecter</a>
            @endif
         
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Se déconnecter') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </div>

</nav>
