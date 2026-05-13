<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index(){
        return view('admin.dashboar');
    }

    public function login(){
        return view('admin.login');
    }

    public function adminauth(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($validation)){
            if(Auth::user()->role == 'admin'){
                return redirect()->intended('admin');
            } else{
                return redirect()->intended('admin/login');
            }
        }

        return redirect()->back()->with('message', 'login failed');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
