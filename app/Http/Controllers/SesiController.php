<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
       return view('sesi/login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            } elseif(Auth::user()->role == 'mahasiswa'){
                return redirect('/mahasiswa');
            }
        }else{
            return redirect('')->withErrors('Username dan password tidak valid')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('')->with('success', 'Berhasil Logout');
    }
}
