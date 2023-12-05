<html>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Auth/auth.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link href="{{ asset('/css/bootstrap-icons.css') }}" rel="stylesheet">

    <title> @yield('title', $applicationName ) </title>


    <body> 
    <div class="row">
            <div class="header">
                <div class="row">
                    <div class="col-3 col-md-2" style="font-size: 24px; margin-top:8px; text-align:start">
                        <span style="margin-left:10px;"> @yield('title', $applicationName)</span>
                    </div>
                    <div class="col-7 col-md-9" style="text-align:center; padding-top:10px; font-size: 24px;font-family:Comic Sans MS, Comic Sans, cursive;">
                        <!--  --> 
                    </div>
                    <div class="col-1 col-md-1 icon" style="text-align:right"> 
                       <!--  --> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center" >
            <div class="col-5">
                <div class="container mt-5 content">
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>
                    <!-- <div class="row">
                        @guest
                            <div class="col-8 offset-2 d-flex justify-content-center align-items-center">     
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="button m-2">Zaloguj się</a>
                                @endif
                                
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button m-2">Zarejestruj się</a>
                                @endif
                            
                                @else
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
                                @endelse
                            </div>
                        @endguest
                    </div> -->
                </div>
            </div>  
        </div>
    
    </body>
</html>
