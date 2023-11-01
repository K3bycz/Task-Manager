<html>
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

        <title> @yield('title', $applicationName ) </title>

        <script src="{{ asset('js/clock.js') }}"></script>

        <div class="header">
            <div>
                <a href="/user"> <img src="{{ asset('/images/user.png') }}" alt="User" style="width:40px;height:40px;right: 1%;position: fixed; padding-top:5px;"></a>
            </div>
        
            <div style="  display: flex; justify-content: center;padding-top:10px;font-size: 24px;font-family:Comic Sans MS, Comic Sans, cursive;">
                @yield('title', $applicationName) 
            </div>
            </div>

    </head>
    <body>

        <div class="sidebar">   
            @section('sidebar')
                <ul>
                    <li> <a href="/" >&#128726; Pulpit </a></li>
                </ul>
                <ul>
                    <li><br>ZADANIA</li>
                </ul>
                <ul>
                    <li> <a href="/tasks" >&#x1F5F9; Lista</a></li>
                </ul>
                <ul>
                    <li> <a href="/tasks/create" >&#10133; Dodaj</a></li>
                </ul>
                <ul>
                    <li><br>UŻYTKOWNICY</li>
                </ul>
                <ul>
                    <li><a href="/users" >&#128100; Lista</a></li>
                </ul>
            @show
           
        </div>
            <div class="clock">
            <b><span id="clock"></span></b>
            </div>

        <div class="container"> <!-- tutaj wyświetl wszystko co w widoku wrzuce do diva content -->
                @yield('content')
        </div>
    </body>
</html>