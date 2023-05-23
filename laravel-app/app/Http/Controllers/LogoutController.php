<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        Auth::logout();
    
        Session::invalidate();
        Session::flush();
        Session::regenerateToken();
    
        return redirect('/login');
    }
}
