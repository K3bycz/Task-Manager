@extends('layout.auth')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/Auth/login.css') }}">
    <style>

.block{
    height:50%;
    bottom:20%;
}
</style>
</head>

<div class="container">
    <div><h2>Rejestracja</h2></div>

    <form method="POST" action="{{ route('register') }}">
    @csrf

        <input id="firstName" type="text" class="form-control @error('name') alert @enderror" name="firstName" placeholder="Imię:" required autocomplete="firstName" autofocus><br>
           
        <input id="lastName" type="text" class="form-control @error('name') alert @enderror" name="lastName" placeholder="Nazwisko:" required autocomplete="lastName" autofocus><br>
        
        <input type="email" class="form-control @error('email') alert @enderror" name="email" placeholder="Adres e-mail:" required autocomplete="email"><br>

        <input id="password" type="password" class="form-control @error('password') alert @enderror" placeholder="Hasło" name="password" required autocomplete="new-password"><br>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Potwierdź hasło" required autocomplete="new-password"><br>
        
        <button type="submit" class="submitButton">
            Zarejestruj się
        </button>
    </form>
<div>
<div class="registerError">
@error('firstName')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

@error('lastName')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
@endsection