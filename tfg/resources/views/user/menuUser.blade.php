<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilosUser.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/png">
</head>
<body>
    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title"><b>CarSite</b></h2>
            </div>

            <ul class="nav__link nav__link--menu">
                <li class="nav__items">
                    <a href="/alquileres" class="nav__links">Buscar alquiler</a>
                </li>
                <li class="nav__items">
                    <a href="/viajes" class="nav__links">Unirme a viaje</a>
                </li>
                <li class="nav__items">
                    <a href="/misalquileres" class="nav__links">Mis alquileres</a>
                </li>
                <li class="nav__items">
                    <a href="/misviajes" class="nav__links">Mis viajes</a>
                </li>
                <li class="nav__items">
                    <a href="/valoraciones" class="nav__links">Valoraciones</a>
                </li>
                <li class="nav__items">
                    <a href="/saldo" class="nav__links">Añadir saldo</a>
                </li>
                <li class="nav__items">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" class="nav__links">Cerrar sesión</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <img src="{{ asset('images/close.svg') }}" class="nav__close">
            </ul>

            <div class="nav__menu">
                <img src="{{ asset('images/menu.svg') }}" class="nav__img">
            </div>
        </nav>
        
        <section class="hero__container container">
            <h1 class="hero__title">¡Hola {{Auth::user()->name}}!</h1>
            <p class="hero__subtitle">Tu saldo actual es: {{Auth::user()->balance}}€</p>
            <p class="hero__subtitle">CarPoints: {{Auth::user()->points}}</p>
            <a href="/perfil/{{Auth::user()->id}}" class="cta">Mi perfil</a>
        </section>
    </header>

    <!-- Content -->
    <main class="d-flex flex-column mt-5">
        @yield('content')
    </main>
    
    <footer class="footer">
        <section class="footer__container container">
            <div class="footer__form">
                <h2 class="footer__newsletter">Nuestras redes sociales</h2>
                <div class="footer__inputs">
                    <a href="#" ><img src="{{ asset('images/twitter.svg') }}" class="about__icon"></a>
                    <a href="#" ><img src="{{ asset('images/facebook.svg') }}" class="about__icon"></a>
                    <a href="#" ><img src="{{ asset('images/instagram.svg') }}" class="about__icon"></a>
                    <a href="#" ><img src="{{ asset('images/youtube.svg') }}" class="about__icon"></a>
                </div>
            </div>
        </section>

        <section class="footer__copy container">
            <div class="footer_social">
                <a href="#" class="footer__icons"><img src="" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="" class="footer__img"></a>
            </div>

            <h3 class="footer__copyright">Derechos reservados &copy; Javier García Lillo</h3>
        </section>
    </footer>
</body>
</html>
