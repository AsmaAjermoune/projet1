<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    {   $admin = User::where('role','superAdmin')->exists();
        if(!$admin){
            DB::table('users')->insert([
              'name'=>'Asma',
              'email'=>'asma@gmail.com',
              'password'=> Hash::make('20042004'),
              'role'=>'superAdmin'
            ]);
            
        }
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