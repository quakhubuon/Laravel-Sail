<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('pages.list_user')->with(['users' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function add_user()
    {
        return view('pages.add_user');
    }
    
    public function create(Request $request)
    {
        $user = array();

        // Hash the password
        $user['password'] = bcrypt($request->password);
        $user['email'] = $request->email;
        $user['name'] = $request->name;
        

        // Create the user
        user::create($user);
        
        return Redirect::to('admin/list_user');
    }
}