@extends('layout.auth')

@section('content')
<div class="container">
    <h2 class="mt-3 mb-3">Zresetuj hasło</h2>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 blue">
                        <input type="hidden" name="token" class="form-control" value="{{ $token }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="email" id="email" name="email" class="form-control" value="{{ $email ?? old('email') }}" required autofocus placeholder="Podaj adres email">
                    </div>
                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control"  required placeholder="Podaj nowe hasło">
                    </div>
                    <div class="col-md-6">
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control"  required placeholder="Powtórz hasło">
                    </div>
                    <div class="col-6 offset-3" style="text-align:center">  
                        <button type="submit" class="loginButton button m-2">
                            Zresetuj hasło
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if ($errors->has('email'))
            <div class="alert alert-danger col-6 offset-3">
                Wprowadzono błędny email.
            </div>
        @elseif (session('status'))
            <div class="alert alert-success col-6 offset-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>

@endsection
