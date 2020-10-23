<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->user = new UserRepository;
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/manage/dashboard');
        }
        
        return view('manage.auth.login');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        $credentials = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::attempt($credentials)) {
            return redirect('/manage/dashboard');
        } else {
            $request->session()->flash('login_failed', 'Maaf, username atau password anda salah');
        }

        if (Auth::check()) {
            return redirect('manage/dashboard');
        } else {
            return view('manage.auth.login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect('/manage/auth/login');
    }
}
