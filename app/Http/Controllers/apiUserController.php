<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

session_start();

class apiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'email' => ($request->admin_email),
            'password' => ($request->admin_password),
        ];
        
        if (Auth::attempt($data)) {
            return 'ok';
            // return Redirect::to('admin/dashboard');
        } else {
            Session::put(['message' => 'Sai email hoặc mật khẩu!']);
            return Redirect::to('admin');
        }            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Auth::logout();
        return Redirect::to('admin');
    }
}
