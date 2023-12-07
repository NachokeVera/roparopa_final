<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        $rut = $request->rut;
        $password = $request->password;
        if (Auth::attempt(['rut' => $rut, 'password' => $password])) {
            return redirect()->route('inicio');
        }
        else{
            return redirect()->route('show.login')->withErrors(trans('auth.failed'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('show.login');
    }
}
