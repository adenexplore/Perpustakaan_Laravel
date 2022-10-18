<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authanticate(Request $request)
    {
        // dd($request->all());
            $login = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
    
            $user = User::all()->where('email', $login['email'])->first();

                Auth::attempt($login);
                Auth::login($user);
                $request->session()->regenerate();
    
                return redirect()->intended('/dashboard');
            if (!$user) {
                return back()->with('loginError', 'Login gagal! Silahkan coba lagi');

            }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}