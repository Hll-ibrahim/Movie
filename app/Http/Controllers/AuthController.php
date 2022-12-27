<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function loginPost(Request $request) {

        if(Auth::attempt(['email'=>$request->email, "password"=>$request->password])) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->withErrors('E-mail veya şifre hatalı!');
    }

    public function register() {
        return view('back.auth.register');
    }
    public function registerPost(Request $request) {
        $request->validate([
            'name'=>'required | min:5',
            'email'=>'required | email',
            'password'=>'required | min:6 | max:20 | confirmed',
            'password_confirmation'=>'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.home');
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
