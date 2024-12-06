<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData=request()->validate([
            'name'=>['required','max:255','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required','max:255',Rule::unique('users','username')],
            'password'=>['required','min:8']
        ]);

        $user=User::create($formData);

        auth()->login($user);

        return redirect('/')->with('success','Welcome Dear, '.$user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formData=request()->validate([
            'email'=>['required','max:255','email',Rule::exists('users','email')],
            'password'=>['required','min:8','max:255']
        ],[
            'email.required'=>'We need your address',
            'password.required'=>'We need the password'
        ]);
        if (auth()->attempt($formData))
        {
            return redirect('/')->with('success','Welcome Back');
        }
        else
        {
            return redirect()->back()->withErrors([
                'email'=>'Wrong User',
                'password'=>'Wrong Password'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success','Good Bye');
    }
}
