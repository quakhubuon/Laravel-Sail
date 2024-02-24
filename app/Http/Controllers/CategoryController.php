<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryController extends Controller
{
    public function add_category() {
        return view('pages.add_category');
    } 

    public function list_category() {
        $data = DB::table('tbl_product_category')->get();
        return view('pages.list_category')->with(['categorys' => $data]);
    } 

    public function category(Request $request) {
        $data = array();
        
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        $result = DB::table('tbl_category_product')->insert($data);
        
        if($result) {
            Session::put(['message' => 'Thêm danh mục thành công']);
        } else {
            Session::put(['message' => 'Thêm danh mục không thành công']);
        }
        
        return Redirect::to('admin/list_category');
    } 

    public function get_category() {
        $data = DB::table('tbl_category_product')->get();
        return view('pages.list_category')->with(['categorys' => $data]);
    }

    public function edit_category($id) {
        $data = DB::table('tbl_category_product')->where('category_id', [$id])->get();
        return view('pages.edit_category')->with(['categorys' => $data]);
    }

    public function update_category(Request $request) {
        $data = array();
        
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        $result = DB::table('tbl_category_product')->where('category_id', [$request->category_id])->update($data);
        
        if($result) {
            Session::put(['message' => 'Cập nhật danh mục thành công']);
        } else {
            Session::put(['message' => 'Cập nhật danh mục không thành công']);
        }
        
        return Redirect::to('admin/list_category');
    }

    public function delete_category($id) {
        
        DB::table('tbl_category_product')->where('category_id', [$id])->delete();
        return Redirect::to('admin/list_category');
    }
}