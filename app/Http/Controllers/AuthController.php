<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.index');
    }


    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username Wajib di isi',
            'password.required' => 'Password wajib di isi'
        ]);
        if (Auth::attempt($request->only('username', 'password'))) {

            if ($request->User()->status_id == 1) {
                return redirect('/DashboardPegawai');
            } elseif ($request->User()->status_id == 2) {
                return redirect('/DashboardGudang');
            } elseif ($request->User()->status_id == 3) {
                return redirect('/dashboardmanajer');
            }
        }
        return redirect('/login')->with('gagal', 'username/password salah');
    }
    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }
}