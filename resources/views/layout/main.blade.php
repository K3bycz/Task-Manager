<html>
    <head>
        <meta charset="utf-8">
        <title> @yield('title', $applicationName ) </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

        <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <link rel="stylesheet" href="/libraries/country-select-js-master/build/css/countrySelect.css">
        <script src="/libraries/country-select-js-master/build/js/countrySelect.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <link href="{{ asset('/css/bootstrap-icons.css') }}" rel="stylesheet">

        <script src="{{ asset('js/clock.min.js') }}"></script>
    </head>
    
    <body>
        <div class="row">
            <div class="header">
                <div class="row">
                    <div class="col-3 col-md-2 clock" style="margin-top:8px; text-align:start">
                        <span style="margin-left:10px;"> @yield('title', $applicationName)</span>
                    </div>
                    <div class="col-7 col-md-9" style="text-align:center; padding-top:10px; font-size: 24px;font-family:Comic Sans MS, Comic Sans, cursive;">
                    <!-- <span id="clock"></span> --> 
                    </div>
                    <div class="col-1 col-md-1 icon" style="text-align:right"> 
                        <a href="/user"> <img src="{{ asset('/images/user.png') }}" alt="User" style="width:45px; height:45px; margin-right:5px;"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 col-md-1 p-0 m-0">
                <div class="sidebar">
                    @section('sidebar')
                        <ul class="list-unstyled">
                            <li>
                                <a href="/">&#128726; Pulpit</a>
                            </li>
                            <li class="text-uppercase mt-2 mb-2">
                                zadania
                            </li>
                            <li>
                                <a href="/tasks">&#x1F5F9; Lista</a>
                            </li>
                            <li>
                                <a href="/tasks/create">&#10133; Dodaj</a>
                            </li>
                            <li class="text-uppercase mt-2 mb-2">
                                użytkownicy
                            </li>
                            <li>
                                <a href="/users" >&#128100; Lista</a>
                            </li>
                        </ul>
                    @show
                </div>
            </div>
            <div class="col-9 col-md-11">
                <div class="row">
                    
                        @yield('content')
                    
                </div>
            </div>
        </div>
    </body>
</html>