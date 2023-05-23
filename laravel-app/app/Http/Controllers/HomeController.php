<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'session' => Session::get('userId')
        ]);
    }
}
