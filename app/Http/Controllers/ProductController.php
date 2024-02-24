<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function add_product() {
        $data = DB::table('tbl_category_product')->get();
        return view('pages.add_product')->with(['data' => $data]);;
    }

    public function get_product() {
        $data = DB::table('tbl_product')->get();
        return view('pages.list_product')->with(['products' => $data]);
    }
    
    public function product(Request $request) {
        $data = array();
        
        $data['category_id'] = $request->category_id;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/FE/images', $new_image);
            $data['product_image'] = $new_image;
        } else {
            $data['product_image'] = '';
        }
        
        $result = DB::table('tbl_product')->insert($data);
        
        if($result) {
            Session::put(['message' => 'Thêm sản phẩm thành công']);
        } else {
            Session::put(['message' => 'Thêm sản phẩm không thành công']);
        }
        
        return Redirect::to('admin/list_product');
    }

    public function edit_product($id) {
        $data = DB::table('tbl_product')->where('product_id', [$id])->get();
        return view('pages.edit_product')->with(['products' => $data]);
    }

    public function delete_product($id) {
        
        DB::table('tbl_product')->where('product_id', [$id])->delete();
        return Redirect::to('admin/list_product');
    }

    public function update_product(Request $request) {
        $data = array();
        
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->category_id;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
            $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/FE/images', $new_image);
            $data['product_image'] = $new_image;
        } 
        $result = DB::table('tbl_product')->where('product_id', [$request->product_id])->update($data);
        
        if($result) {
            Session::put(['message' => 'Cập nhật sản phẩm thành công']);
        } else {
            Session::put(['message' => 'Cập nhật sản phẩm không thành công']);
        }
        
        return Redirect::to('admin/list_product');
    }
}