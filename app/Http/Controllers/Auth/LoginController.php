<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        
        if(!\Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->back()->with('msg', '<b>Login gagal</b>.</br>Masukan username dan password yang benar!');
        }
        return redirect()->intended('admin');
    }

    public function logout(){

        \Auth::logout();
        return redirect()->to('/admin');
    }
}