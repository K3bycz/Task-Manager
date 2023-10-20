<html>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Auth/auth.css') }}">


    <title> @yield('title', $applicationName ) </title>
    <script src="{{ asset('js/clock.js') }}"></script>
</head>
<body>
    <!-- header -->
    <div class="header" style="  display: flex; justify-content: center;padding-top:20px;font-size: 24px;font-family:Comic Sans MS, Comic Sans, cursive;">
        @yield('title', $applicationName) 
    </div>

    <div class="clock">
        <b><span id="clock"></span></b>
    </div>

    <div class="block">

        <!-- zawartość strony -->
        <main>
        @yield('content')
        </main>

        <!-- menu logowania -->
        <ul>
            @guest
                @if (Route::has('login'))
                <div class="login"> 
                    <li>
                        <a href="{{ route('login') }}">Zaloguj się</a>
                    </li>
                </div>
                @endif

                @if (Route::has('register'))
                <div class="register">
                    <li>
                        <a  href="{{ route('register') }}">Zarejestruj się</a>
                    </li>
                </div>
                @endif

                @else<!-- Nwm co to -->
                    <li>
                        <a id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Wyloguj się
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            </form>
                        </div>
                    </li>
            @endguest
        </ul>
    </div>
   
</body>
</html>
