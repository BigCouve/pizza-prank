<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use App\Models\Role;


class RegisterController extends Controller
{
    public function index()
    {
        $username = '';
        $role = '';

        if(Session::has('userId')){
            $username = Session::get('userId');
            $role = Session::get('userRole');
        }

        return Inertia::render('Register/Index.vue', [
            'userName' => $username,
            'userRole' => $role,
            'roles' => Role::all(),
        ]);
    }

    public function store(RegisterRequest $request)
    {
        if ($request->validated()) {
            $roleFiltered = null;
            if(User::exists()){
                $roleFiltered = $request->role;
            } else{
                $roleFiltered = 2;
            }
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "roles_id" => $roleFiltered,
            ]);
            
            return redirect('/login')->with('success', "Conta criada com sucesso. Por favor, faça login");
        }
        return redirect()->back()->withErrors($request)->withInput();
    }
}
