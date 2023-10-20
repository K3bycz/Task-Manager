@extends('layout.auth')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/Auth/login.css') }}">
</head>

    <div><h2>Zresetuj hasło</h2></div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
    @csrf

        <input id="email" type="email" class="form-control resetPassword @error('email') is-invalid @enderror" name="email" placeholder="Podaj adres email" required autocomplete="email" autofocus><br>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                        
        <button type="submit" class="submitButton resetPasswordSend">
            Wyślij
        </button>
                        
    </form>

@endsection
