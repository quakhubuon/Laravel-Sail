<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index_permission() {
        return view('pages.add_permission');
    }

    public function index_role() {
        return view('pages.add_role');
    }

    public function create_permission(Request $request) {
        $data = array();
        
        $data['name'] = $request->name;
        
        $result = Permission::create(['guard_name' => 'web', 'name' => $data['name']]);
        
        if($result) {
            Session::put(['message' => 'Thêm thành công']);
        } else {
            Session::put(['message' => 'Thêm không thành công']);
        }
        
        return Redirect::to('admin/list_permission');
    }

    public function create_role(Request $request) {
        $data = array();
        
        $data['name'] = $request->name;
        
        $result = Role::create(['guard_name' => 'web', 'name' => $data['name']]);

        if($result) {
            Session::put(['message' => 'Thêm thành công']);
        } else {
            Session::put(['message' => 'Thêm không thành công']);
        }
        
       return Redirect::to('admin/list_role');
    }

    public function list_permission() {
        $data = DB::table('permissions')->get();
        return view('pages.list_permission')->with(['data' => $data]);;
    }

    public function list_role() {
        $data = DB::table('roles')->get();
        return view('pages.list_role')->with(['data' => $data]);;
    }

    public function phan_quyen(Request $request) {
        $id = $request->id;
        $data = User::find($id);
        $data2 = $data->getPermissions;
        $data3 = $data->getPermissions->pluck('id')->toArray();
        return view('pages.permission')->with(['user' => $data])->with(['model_has_permissions' => $data2])->with(['model_has_permissions_array' => $data3]);
    }

    public function vai_tro(Request $request) {
        $id = $request->id;
        $data = User::find($id);
        $data2 = $data->getRoles;
        $data3 = $data->getRoles->pluck('id')->toArray();
        return view('pages.role')->with(['user' => $data])->with(['model_has_roles' => $data2])->with(['model_has_roles_array' => $data3]);
    }

    public function add_permission(Request $request) {
        $user_id = $request->user_id;
        $permission = $request->permission;
        $user = User::find($user_id);
        $result = $user->syncPermissions([$permission]);
        
        if($result) {
            Session::put(['message' => 'Thêm thành công']);
        } else {
            Session::put(['message' => 'Thêm không thành công']);
        }
        
        return Redirect::to('admin/list_user');
    }

    public function add_role(Request $request) {
        $user_id = $request->user_id;
        $role = $request->role;
        $user = User::find($user_id);
        $result = $user->syncRoles([$role]);
        
        if($result) {
            Session::put(['message' => 'Thêm thành công']);
        } else {
            Session::put(['message' => 'Thêm không thành công']);
        }
        
        return Redirect::to('admin/list_user');
    }
}