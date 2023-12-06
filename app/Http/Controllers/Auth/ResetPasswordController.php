<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill(['password' => Hash::make($password)])->save();
            }
        );
        
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', 'Operacja przebiegła pomyślnie! Zaloguj się za pomocą nowego hasła')
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => request()->email]
        );
    }
}