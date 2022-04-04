<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio</title>
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
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
                        <a href="{{route('login')}}" class="nav__links">Iniciar Sesión</a>
                    </li>
                    <li class="nav__items">
                        <a href="{{route('register')}}" class="nav__links">Regístrate</a>
                    </li>
                    <img src="{{ asset('images/close.svg') }}" class="nav__close">
                </ul>

                <div class="nav__menu">
                    <img src="{{ asset('images/menu.svg') }}" class="nav__img">
                </div>
            </nav>
            
            <section class="hero__container container">
                <h1 class="hero__title">Únete y comparte tus viajes y vehículos</h1>
                <p class="hero__paragraph">Regístrate ya para comenzar tu experiencia con CarSite</p>
                <a href="{{route('register')}}" class="cta">Comienza ahora</a>
            </section>
        </header>

        <main>
            <section class="container about">
                <h2 class="subtitle">¡Alquila un coche o comparte el tuyo propio cuando no le das uso!</h2>
                <p class="about__paragraph"> En esta web puedes encontrar todo lo que necesitas para compartir tus viajes, tus coches   
                o apuntarte al de otras personas y poder alquilar los vehículos disponibles del catálogo</p>
                <div class="about__main">
                    <article class="about__icons">
                        <img src="{{ asset('images/money.svg') }}" class="about__icon">
                        <h3 class="about__title">Viajes baratos</h3>
                        <p class="about__paragraph">Encuentra tu viaje ideal a cualquier destino que quieras a un precio asequible y apto para ti.</p>
                    </article>

                    <article class="about__icons">
                        <img src="{{ asset('images/user.svg') }}" class="about__icon">
                        <h3 class="about__title">Seguridad</h3>
                        <p class="about__paragraph">Examinamos las opiniones y los perfiles de nuestros usuarios para que sepás con quien vas a viajar.</p>
                    </article>

                    <article class="about__icons">
                        <img src="{{ asset('images/car.svg') }}" class="about__icon">
                        <h3 class="about__title">Rapidez</h3>
                        <p class="about__paragraph">Gracias a nuestra sencilla y potente aplicación puedes reservar un viaje cerca de ti en minutos.</p>
                    </article>
                </div>
            </section>

            <section class="knowledge">
                <div class="knowledge__container container">
                    <div class="knowledge__texts">
                        <h2 class="subtitle">Ayudas en la protección frente a las estafas!</h2>
                        <p class="knowledge__paragraph">En CarSite, estamos en constante mejora para que la plataforma sea lo más segura posible. Cualquier 
                            problema que tengas estaremos encantados de atenderlo. 
                            No olvides registrarte para disponer de todos nuestros servicios!
                        </p>
                        <a href="{{route('register')}}" class="cta">Entra</a>
                    </div>

                    <figure class="knowledge__picture">
                        <img src="{{asset('images/estafa2.jpg')}}" class="knowledge__img">
                    </figure>
                </div>
            </section>

            <section class="questions container">
                <h2 class="subtitle">Preguntas frecuentes</h2>
                <p class="questions__paragraph">Una vez este la web realizada introducire como hacer cosas como, compartir coche, usirse a viajes.... etc</p>

                <section class="questions__container">
                    <article class="questions__padding">
                        <div class="questions__answer">
                            <h3 class="questions__title">¿Qué es esto 1? 
                                <span class="questions__arrow">
                                    <img src="{{asset('images/arrow.svg')}}" class="questions__img">
                                </span>
                            </h3>
                            <p class="questions__show">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, odit veniam. Labore pariatur quas amet commodi ullam, assumenda velit! Rem ea sint quaerat eligendi provident magni repellat quos officia quo?
                            consectetur adipisicing elit. Laudantium, odit veniam. Labore pariatur quas amet commodi ullam, assumenda velit! Rem ea sint quaerat eligendi provident magni repellat quos officia quo? consectetur adipisicing elit.</p>
                        </div>
                    </article>

                    <article class="questions__padding">
                        <div class="questions__answer">
                            <h3 class="questions__title">¿Qué es esto 2? 
                                <span class="questions__arrow">
                                    <img src="{{asset('images/arrow.svg')}}" class="questions__img">
                                </span>
                            </h3>
                            <p class="questions__show">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, odit veniam. Labore pariatur quas amet commodi ullam, assumenda velit! Rem ea sint quaerat eligendi provident magni repellat quos officia quo?
                            consectetur adipisicing elit. Laudantium, odit veniam. Labore pariatur quas amet commodi ullam, assumenda velit! Rem ea sint quaerat eligendi provident magni repellat quos officia quo? consectetur adipisicing elit. </p>
                        </div>
                    </article>

                    <article class="questions__padding">
                        <div class="questions__answer">
                            <h3 class="questions__title">¿Qué es esto 3? 
                                <span class="questions__arrow">
                                    <img src="{{asset('images/arrow.svg')}}" class="questions__img">
                                </span>
                            </h3>
                            <p class="questions__show">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, odit veniam. Labore pariatur quas amet commodi ullam, assumenda velit! Rem ea sint quaerat eligendi provident magni repellat quos officia quo?
                            consectetur adipisicing elit. Laudantium, odit veniam. Labore pariatur quas amet commodi ullam, assumenda velit! Rem ea sint quaerat eligendi provident magni repellat quos officia quo? consectetur adipisicing elit.</p>
                        </div>
                    </article>
                </section>
            </section>
        </main>

        <footer class="footer">
            <section class="footer__container container">
                <nav class="nav nav--footer">
                    <h2 class="footer__title">CarSite</h2>

                    <ul class="nav__link nav__link--footer">
                        <li class="nav__items">
                            <a href="{{route('login')}}" class="nav__links">Iniciar Sesión</a>
                        </li>
                        <li class="nav__items">
                            <a href="{{route('register')}}" class="nav__links">Regístrate</a>
                        </li>
                    </ul>
                </nav>

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
        <script src="{{asset('js/questions.js')}}"></script>
        <script src="{{asset('js/menu.js')}}"></script>
    </body>
</html>

