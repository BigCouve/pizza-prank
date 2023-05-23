<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Inertia\Inertia;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;




class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Login/Index.vue');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->all();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::put('userId',  $request->user()->name);
            Session::put('userRole', $request->user()['roles_id']);

            return to_route('home.index');
        }   
        return back()->withErrors([
            'not-found' => 'Email e/ou senha não encontrados',
        ])->withInput();
    }
}
