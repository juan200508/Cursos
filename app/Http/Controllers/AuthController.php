<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            "status" => 1,
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route('services.index'))->with('inicio', 'ha iniciado sesion');
        } else {
            return view('autentication.login')->with('error', 'ha ocurrido un error');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('autentication.login'))->with('cerrar', 'has cerrado sesion');
    }
}
