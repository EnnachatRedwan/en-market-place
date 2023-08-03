<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //register form
    public function register(){
        return view('users.register');
    }

    //store user
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required','min:3','max:30'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:6','max:30','confirmed']
        ]);

        // dd($formFields);

        $formFields['password'] = Hash::make($formFields['password']);

        $user = User::create($formFields);

        Auth::login($user);

        return redirect()->route('home')->with('message','welcome '.$user->name);
    }

    //Login page
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([            
            'email'=>['required','email'],
            'password'=>['required','min:6','max:30']
        ]);

        if(Auth::attempt($formFields)){
            session()->regenerate();
            return redirect()->route('home')->with('message','Welcome back '. Auth::user()->name);
        }

        return back()->with('error','Invalid credintials');
    }

    //logout user
    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('home')->with('message','See you soon!');
    }
}
