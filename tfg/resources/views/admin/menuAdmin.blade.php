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
                    <a href="#">
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

            <div class="search">
                <form method="GET">
                    <input type="text" placeholder="Buscar usuario">
                    <div class="btnSearch">
                        <button type="submit" class="btnsend"><ion-icon name="search-outline"></ion-icon></button>
                    </div>
                </form>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Usuarios</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Nombre</td>
                                <td>Apellidos</td>
                                <td>Email</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->lastname }}</td>
                                    <td>{{ $u->email }}</td>
                                    @if($u->blocked)
                                        <td><span class="status pending">delivered</span></td>
                                    @else
                                        <td><span class="status delivered">delivered</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>
                    <table>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="{{ asset('images/perfil.png') }}"></div></td>
                            <td><h4>David<br><span>Italy</span></h4></td>
                        </tr>
                    </table>
                </div>
            </div>
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