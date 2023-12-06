@extends('layout.auth')

@section('content')
<div class="container">
    <h2 class="mt-3 mb-3">Zresetuj hasło</h2>
    <div class="row">
        <form method="POST" action="{{ route('password.email') }}">
        @csrf
            <input id="email" type="email" class="form-control resetPassword @error('email') is-invalid @enderror" name="email" placeholder="Podaj adres email" required autocomplete="email" autofocus><br>
            <div class="col-6 offset-3" style="text-align:center">                   
                <button type="submit" class="loginButton button m-2">
                    Wyślij
                </button>
            </div>                   
        </form>
        @if ($errors->has('email'))
            <div class="alert alert-danger col-6 offset-3">
                Wprowadzono błędny email.
            </div>
        @elseif (session('status'))
            <div class="alert alert-success col-6 offset-3">
                Link resetujący hasło został wysłany na podany adres e-mail.
            </div>
        @endif
    </div>
</div>

@endsection
