<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('/admin/dashboard');
        }
        return view('adm.login');
    }

    public function login(Request $request)
    {
           
        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];
 
        Auth::guard('admin')->attempt($credentials);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('/admin/dashboard');
 
        } else { // false
            return redirect()->route('login')->with('errors', 'Username atau Password anda salah!');
        }
 
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
