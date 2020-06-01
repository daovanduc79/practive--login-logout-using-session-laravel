<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('layouts.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username === 'admin' and $password === '123456') {
            session()->push('login','hello');

            return redirect()->route('show.blog');
        }

        session()->flash('login-fail', 'tai khoan mat khau khong chinh xac');

        return view('layouts.login');

    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('show.login');
    }


}
