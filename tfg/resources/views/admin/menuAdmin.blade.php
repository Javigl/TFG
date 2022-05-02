<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilosAdmin.css') }}">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="car-sport-outline"></ion-icon></span>
                        <span class="title">CarSite</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="bag-handle-outline"></ion-icon></span>
                        <span class="title">Alquileres</span>
                    </a>
                </li>
                <li>
                    <a href="/administrarViajes">
                        <span class="icon"><ion-icon name="paper-plane-outline"></ion-icon></span>
                        <span class="title">Viajes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
                        <span class="title">Opiniones</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Cerrar sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{ $numUsers }}</div>
                        <div class="cardName">Usuarios</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">{{ $numViajes }}</div>
                        <div class="cardName">Viajes</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">{{ $numAlquileres }}</div>
                        <div class="cardName">Alquileres</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">{{ $numOpiniones }}</div>
                        <div class="cardName">Opiniones</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        //Añadir clase hovered en el item seleccionado del menu
        let list = document.querySelectorAll('.navigation li');
        console.log(list);
        function activeLink(){
            list.forEach((item) => item.classList.remove('hovered'));
            this.classList.add('hovered');
        }

        list.forEach((item) => item.addEventListener('mouseover', activeLink));
    </script>
</body>
</html>