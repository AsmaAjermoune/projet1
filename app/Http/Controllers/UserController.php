<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(StoreUserRequest $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password_text'=>'required',
            'role'=>'required',
        ]);

        User::create($request->all());
        return view('auth.login');
    }

    public function afficher_register()
    {
        return view('auth.create');
    }

    public function afficher_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

      if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect()->route('students.index')->with('success', 'User logged in successfully');
    } else {
        return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
    }
    }
}