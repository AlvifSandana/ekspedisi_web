<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * show login form
     */
    public function showLoginForm(){
        if (Auth::check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return view('admin.login');
    }

    /**
     * handle login
     */
    public function login(Request $request){
        // validation rules
        $rules = [
            'email'     => 'required|email',
            'password'  => 'required'
        ];
        // custom error message for validation
        $messages = [
            'required'      => ':attribute tidak boleh kosong!',
            'email.email'   => 'Email tidak valid!'
        ];
        // create validator instance
        $validator = Validator::make($request->all(), $rules, $messages);
        // validation process
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        // login data
        $login_data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];
        $admin = Admin::where('email', $login_data['email'])->first();
        if ($admin) {
            if (Hash::check($login_data['password'], $admin->password)) {
                Auth::attempt($login_data);
                if (Auth::check()) {
                    return redirect()->route('admin.dashboard.index')->with('success', 'Selamat datang, Admin.');
                } else {
                    return redirect()->route('login.form')->with('error', 'Email atau password salah!');
                }
            }
        } else {
            return redirect()->route('login.form')->with('error', 'Email atau password salah!');
        }
    }

    /**
     * handle logout
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }
}
