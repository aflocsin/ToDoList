<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(){
        if (View::exists('login')){
            return view('login');
        }else{
            return abort(404);
        }
    }

    public function success(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/login');
        }else{
            return redirect('/login');
        }
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|min:4'
        ]);
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);
        auth()->login($user);
        return redirect('/tasks');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'Logout successful');
    }

    // public function show($id){
    //     $data = ["data" => "data from db"];
    //     return view('user')
    //             ->with('data' , $data)
    //             ->with('name' , 'Ace')
    //             ->with('age', 25)
    //             ->with('email', 'aflocsin@gmail.com')
    //             ->with('id', $id);
    // }
}