<html>
    <head>
        <meta charset="utf-8">
        <title> @yield('title', $applicationName ) </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/clock.min.js') }}"></script>

        <div class="header">
            <div>
                <a href="/user"> <img src="{{ asset('/images/user.png') }}" alt="User" style="width:40px;height:40px;right: 1%;position: fixed; padding-top:5px;"></a>
            </div>
            <div style="display: flex; justify-content: center;padding-top:10px;font-size: 24px;font-family:Comic Sans MS, Comic Sans, cursive;">
                @yield('title', $applicationName) 
            </div>
        </div>
    </head>

    <body>
        <div class="sidebar"> 
            @section('sidebar')
                <ul class="list-unstyled">
                    <li><a href="/" >&#128726; Pulpit</a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><br>ZADANIA</li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="/tasks" >&#x1F5F9; Lista</a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="/tasks/create" >&#10133; Dodaj</a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><br>UŻYTKOWNICY</li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="/users" >&#128100; Lista</a></li>
                </ul>
            @show
        </div>
        <div class="clock">
            <b><span id="clock"></span></b>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>