@extends('layout.auth')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/Auth/login.css') }}">
</head>

<body>

    <div class="container">
        
        <div><h2>Zaloguj się</h2></div>

        <form method="POST" action="{{ route('login') }}">
        @csrf
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Adres email:" required autocomplete="email" autofocus><br>
              
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Hasło:"required autocomplete="current-password"><br>

            @if (Route::has('password.request'))
                <a class="forgottenPassword" href="{{ route('password.request') }}">Zapomniałeś hasła?</a><br>
            @endif
                                  
            <button type="submit" class="submitButton loginButton">
                Zaloguj się
            </button>

            <div class="rememberMe">
                <input class="rememberMeBox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                <label for="remember">
                    Zapamiętaj mnie
                </label>
            <div>
          
        </form>
    </div>
 
</body>

<div class="loginError">
@error('email')
    <p class="text-red-500 text-xs italic">{{ $message }}</p>
@enderror
</div>

@endsection
