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

        <div class="header row">
            <div class="col-md-1 clock" style="margin-top:8px;">
                <span id="clock"></span>
            </div>
            <div class="col-md-10" style="text-align:center; padding-top:10px; font-size: 24px;font-family:Comic Sans MS, Comic Sans, cursive;">
                @yield('title', $applicationName) 
            </div>
            <div class="col-md-1" style="text-align:right"> 
                <a href="/user"> <img src="{{ asset('/images/user.png') }}" alt="User" style="width:45px; height:45px; margin-right:10px;"></a>
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
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>