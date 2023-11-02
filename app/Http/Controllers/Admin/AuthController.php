<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }

    public function submitLogin(AdminLoginRequest $request)
    {
        if (Auth::attempt($request->except('_token'))) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error', 'Login Credentials Donot Match');
    }


    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('public.index');
    }
}
