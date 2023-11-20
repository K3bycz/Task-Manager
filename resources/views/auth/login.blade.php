@extends('layout.auth')

@section('content')
    <div class="container">
        <h2 class="mt-3 mb-3">Zaloguj się</h2>
        <div class="row">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-12 mb-3">
                <label for="email">Email:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="login/adres e-mail" required autocomplete="email" autofocus>
            </div>
            <div class="row m-0">
                <div class="col-4 m-0 p-0">
                    <label for="password">Hasło:</label>
                </div> 
                <div class="col-4 offset-4" style="text-align:right">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color:#5d3fd3 !important; font-size:13px;">Zapomniałeś hasła?</a><br>
                    @endif
                </div> 
            </div> 
            <div class="col-12 m-0 p-0">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********"required autocomplete="current-password">
            </div> 
            <div class="col-3">
                <input type="checkbox" class="form-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Zapamiętaj mnie</input>
            </div>
            <div class="col-6 offset-3 d-flex justify-content-center align-items-center">
                <button class="button m-2" type="submit">
                    Zaloguj się
                </button>
            </div>
            <div class="col-6 offset-3" style="font-size:13px; text-align:center">
                Nie posiadasz jeszcze konta? <a href="/register" style="color:#5d3fd3 !important">Zarejestruj się</a>
            </div>
            </form>
        </div>
    </div>
 


<div class="loginError">
@if ($errors->has('email'))
    <div class="alert alert-danger col-lg-6 offset-lg-3">
        Wprowadzono błędny email.
    </div>
@elseif ($errors->has('password'))
    <div class="alert alert-danger col-lg-6 offset-lg-3">
        Wprowadzono błędne hasło!
    </div>
@endif
</div>

@endsection
