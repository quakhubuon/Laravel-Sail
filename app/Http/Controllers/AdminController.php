<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function index() {
        return view('pages.admin_home');
    }

    public function login() {
        return view('admin_login');
    }

    public function register() {
        return view('admin_register');
    }

    public function admin_register(Request $request) {
        $user = array();

        // Hash the password
        $user['password'] = bcrypt($request->password);
        $user['email'] = $request->email;
        $user['name'] = $request->name;
        

        // Create the user
        user::create($user);

        // Redirect
        return redirect()->route('login')->with($request->only('email', 'password'));
    }

    public function sign_in(Request $request) { 

        $data = [
            'email' => ($request->admin_email),
            'password' => ($request->admin_password),
        ];
        
        if (Auth::attempt($data)) {
            return Redirect::to('admin/dashboard');
        } else {
            Session::put(['message' => 'Sai email hoặc mật khẩu!']);
            return Redirect::to('admin');
        }            
    }

    public function log_out() {
        Auth::logout();
        return Redirect::to('admin');
    }
}