@extends('layout.auth')

@section('content')

<div class="container">
    <h2 class="mt-3 mb-3">Zarejestruj się</h2>
    <div class="row">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="firstName">Imię:</label>
                    <input id="firstName" type="text" class="form-control" placeholder="Imię" name="firstName" required autocomplete="firstName" autofocus><br>
                </div>
                <div class="col-6">
                    <label for="lastName">Nazwisko:</label>
                    <input id="lastName" type="text" class="form-control" placeholder="Nazwisko" name="lastName" required autocomplete="lastName" autofocus><br>
                </div>
                <div class="col-12">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control " name="email" placeholder="login/adres e-mail" required autocomplete="email"><br>
                </div>
                <div class="col-6">
                    <label for="password">Hasło:</label>
                    <input id="password" type="password" class="form-control" placeholder="********" name="password" required autocomplete="new-password"><br>
                </div>
                <div class="col-6">
                    <label for="password-confirm">Powtórz hasło:</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********" required autocomplete="new-password"><br>
                </div>
                <div class="col-6 offset-3 d-flex justify-content-center align-items-center">
                    <button type="submit" class="loginButton button m-2">
                        Zarejestruj się
                    </button>
                </div>
                <div class="col-6 offset-3" style="font-size:13px; text-align:center">
                    Masz już konto? <a href="/login" style="color:rgba(242,10,235,1) !important">Zaloguj się</a>
                </div>
            </div>
        </form>
    </div>
<div>
@if ($errors->has('firstName'))
    <div class="alert alert-danger col-lg-6 offset-lg-3">
        Wprowadzono błędne imię.
    </div>
@elseif ($errors->has('lastName'))
    <div class="alert alert-danger col-lg-6 offset-lg-3">
        Wprowadzono błędne nazwisko.
    </div>
@elseif ($errors->has('email'))
    <div class="alert alert-danger col-lg-6 offset-lg-3">
        Wprowadzono błędny email.
    </div>
@elseif ($errors->has('password'))
    <div class="alert alert-danger col-lg-6 offset-lg-3">
        Wprowadzono błędne hasło!<br>
        <span style="font-size:12px">*hasło powinno składać się z minimum 8 znaków</span>
    </div>
@endif
@endsection