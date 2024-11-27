<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    
    <ul>

        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('article.index') }}">Tutti gli articoli</a>
        </li>
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                    </li>
                </ul>
            </li>
            <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                @csrf
            </form>
        @endauth

        @guest
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Benvenuto Ospite
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                    <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.create') }}">Inserisci un articolo</a>
            </li>
            
        @endguest
    </ul>
    
</nav>