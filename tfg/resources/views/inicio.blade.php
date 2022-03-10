<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Prueba</title>
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/png">
    </head>

    <body>
        <header class="hero">
            <nav class="nav container">
                <div class="nav__logo">
                    <h2 class="nav__title">Prueba</h2>
                </div>

                <ul class="nav__link nav__link--menu">
                    <li class="nav__items">
                        <a href="#" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">A cerca de</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Contacto</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Iniciar Sesión</a>
                    </li>
                    <img src="{{ asset('images/close.svg') }}" class="nav__close">
                </ul>

                <div class="nav__menu">
                    <img src="{{ asset('images/menu.svg') }}" class="nav__img">
                </div>
            </nav>
            
            <section class="hero__container container">
                <h1 class="hero__title">Probando cosas nuevas para mi TFG</h1>
                <p class="hero__paragraph"> Estoy intentando hacer un buen TFG para terminar de una vez la carrera, no puedo más. Ánimo</p>
                <a href="#" class="cta">Comienza ahora</a>
            </section>
        </header>

        <main>
            <section class="container about">
                <h2 class="subtitle">Haciendo títulos pa</h2>
                <p class="about__paragraph"> En esta web puedes encontrar todo lo que necesitas para compartir tus viajes, tus coches   
                o apuntarte al de otras personas y poder alquilar los vehículos disponibles del catálogo</p>
                <div class="about__main">
                    <article class="about__icons">
                        <img src="{{ asset('images/car.svg') }}" class="about__icon">
                        <h3 class="about__title">CSS layouts</h3>
                        <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quos natus hic itaque.</p>
                    </article>

                    <article class="about__icons">
                        <img src="{{ asset('images/car.svg') }}" class="about__icon">
                        <h3 class="about__title">CSS layouts</h3>
                        <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quos natus hic itaque.</p>
                    </article>

                    <article class="about__icons">
                        <img src="{{ asset('images/car.svg') }}" class="about__icon">
                        <h3 class="about__title">CSS layouts</h3>
                        <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quos natus hic itaque.</p>
                    </article>
                </div>
            </section>

            <section class="knowledge">
                <div class="knowledge__container container">
                    <div class="knowledge__texts">
                        <h2 class="subtitle">Curso completo para mi TFG. ¡Vamos a hacer magia!</h2>
                        <p class="knowledge__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores illo ea consequatur mollitia 
                            deserunt incidunt molestias error consequuntur? Laudantium repellendus saepe nisi placeat, quam maiores reiciendis molestias 
                            debitis aliquam hic obcaecati accusantium deleniti pariatur magni numquam architecto quisquam rerum eos possimus, adipisci sint? 
                            Odit ipsa voluptas praesentium natus magnam iusto!</p>
                        <a href="#" class="cta">Entra</a>
                    </div>

                    <figure class="knowledge__picture">
                        <img src="{{asset('images/coche.jpg')}}" class="knowledge__img">
                    </figure>
                </div>
            </section>

            <section class="price container">
                <h2 class="subtitle">Poniendo más info a la web</h2>
                <div class="price__table">
                    <div class="price__element">
                        <p class="price__name">FlexBox</p>
                        <h3 class="price__price">free</h3>

                        <div class="price__items">
                            <p class="price__features">FlexBox</p>
                            <p class="price__features">Layouts</p>
                            <p class="price__features">Responsive</p>
                        </div>
                        <a href="" class="price__cta">Empieza ahora</a>
                    </div>
                    
                    <div class="price__element price__element--best">
                        <p class="price__name">Grid</p>
                        <h3 class="price__price">$30/mes</h3>

                        <div class="price__items">
                            <p class="price__features">Grid</p>
                            <p class="price__features">Implicit grid</p>
                            <p class="price__features">Responsive</p>
                        </div>
                        <a href="" class="price__cta">Empieza ahora</a>
                    </div>

                    <div class="price__element">
                        <p class="price__name">Animaciones</p>
                        <h3 class="price__price">$40/mes</h3>

                        <div class="price__items">
                            <p class="price__features">Animation</p>
                            <p class="price__features">Transition</p>
                            <p class="price__features">Render Website</p>
                        </div>
                        <a href="" class="price__cta">Empieza ahora</a>
                    </div>
                </div>
            </section>

            <section class="testimony">
                <div class="testimony__container container">
                    <img src="{{asset('images/left-arrow.svg')}}" class="testimony__arrow" id="before">
                    <section class="testimony__body testimony__body--show" data-id="1">
                        <div class="testimony__texts">
                            <h2 class="subtitle">Mi nombre es Javier García Lillo, <span class="testimony__course">
                                estudiante de ingeniería informática</span></h2>
                                <p class="testimony__review">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, repudiandae!</p>
                        </div>
                        <figure class="testimony__picture">
                            <img src="{{asset('images/person.jpg')}}" class="testimony__img">
                        </figure>
                    </section>

                    <section class="testimony__body" data-id="2">
                        <div class="testimony__texts">
                            <h2 class="subtitle">Mi nombre es Marina Fernández, <span class="testimony__course">
                                estudiante de ingeniería informática</span></h2>
                                <p class="testimony__review">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, repudiandae!</p>
                        </div>
                        <figure class="testimony__picture">
                            <img src="{{asset('images/person.jpg')}}" class="testimony__img">
                        </figure>
                    </section>

                    <section class="testimony__body" data-id="3">
                        <div class="testimony__texts">
                            <h2 class="subtitle">Mi nombre es Alejandro Perea Méndez, <span class="testimony__course">
                                estudiante de ingeniería informática</span></h2>
                                <p class="testimony__review">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, repudiandae!</p>
                        </div>
                        <figure class="testimony__picture">
                            <img src="{{asset('images/person.jpg')}}" class="testimony__img">
                        </figure>
                    </section>
                    <img src="{{asset('images/right-arrow.svg')}}" class="testimony__arrow" id="next">
                </div>
            </section>

            <section class="questions container">
                <h2 class="subtitle">Preguntas frecuentes</h2>
                <p class="questions__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, fugit!</p>

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

                <section class="question__offer">
                    <h2 class="subtitle">¿Estás listo para hacer cosas?</h2>
                    <p class="questions__copy">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda accusantium, maiores delectus suscipit praesentium illum facilis, 
                        perferendis dignissimos molestiae ipsum ad vel necessitatibus quisquam, velit mollitia adipisci unde tempora dolor labore quae sed. Vitae magnam possimus odit consequuntur provident sequi.</p>
                        <a href="#" class="cta">Dale ya!</a>
                </section>
            </section>
        </main>

        <footer class="footer">
            <section class="footer__container container">
                <nav class="nav nav--footer">
                    <h2 class="footer__title">Paginita chula chula</h2>

                    <ul class="nav__link nav__link--footer">
                        <li class="nav__items">
                            <a href="#" class="nav__links">Inicio</a>
                        </li>
                        <li class="nav__items">
                            <a href="#" class="nav__links">A cerca de</a>
                        </li>
                        <li class="nav__items">
                            <a href="#" class="nav__links">Contacto</a>
                        </li>
                        <li class="nav__items">
                            <a href="#" class="nav__links">Iniciar Sesión</a>
                        </li>
                    </ul>
                </nav>

                <form class="footer__form">
                    <h2 class="footer__newsletter">Suscríbete ya</h2>
                    <div class="footer__inputs">
                        <input type="email" placeholder="Email:" class="footer__input">
                        <input type="submit" value="Regístrate" class="footer__submit">
                    </div>
                </form>
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
        <script src="{{asset('js/slider.js')}}"></script>
        <script src="{{asset('js/questions.js')}}"></script>
    </body>
</html>