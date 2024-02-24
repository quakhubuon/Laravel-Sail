<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function login() {
        return view('user_login');
    }

    public function log_out() {
        Session::forget('user');
        Session::forget('cart');
        return Redirect::to('user');
    }

    public function sign_in(Request $request) {
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);

        $data = DB::table('users')->where(['email' => $user_email, 'password' => $user_password])->first();

        if($data != null && $request->check_out != null) {
            Session::put(['user' => $data]);
            return Redirect::to('/check_out');
        }
        else if($data != null && $request->check_out == null) {
            Session::put(['user' => $data]);
            return Redirect::to('/home');
        }
        else {
            Session::put(['message' => 'Sai email hoặc mật khẩu!']);
            return Redirect::to('/user');
        }
    }

    public function detail($id) {
        $data = DB::table('tbl_product')->where('product_id', [$id])->where('product_status', [1])->get();
        return view('pages.detail')->with(['detail' => $data]);
    }

    public function shop() {
        return view('pages.shop');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function cart() {
        return view('pages.cart');
    }

    public function check_out() {
        return view('pages.check_out');
    }

    public function shop_category($id) {
        $data = DB::table('tbl_product')->where('category_id', [$id])->where('product_status', 1)->paginate(6);
        return view('pages.shop')->with(['products' => $data]);
    }

    public function search(Request $request) {
        $data = DB::table('tbl_product')->where('product_name', 'LIKE', '%'. $request->product_name .'%')->where('product_status', [1])->paginate(3);
        return view('pages.shop')->with(['products' => $data]);
    }

    public function filter(Request $request) {
        $category = $request->category;
        $products = DB::table('tbl_product')->whereIn('category_id', explode(',', $category))->get();
        response()->json($products);
        return view('fonts.products', compact('products'));
    }

    public function filterP(Request $request) {
        $temp = $request->price;
        $category = explode(',', $temp);

        // Bắt đầu với một query builder
        $data = DB::table('tbl_product');

        // Duyệt qua từng phần tử trong mảng $category và thêm điều kiện vào $data
        foreach ($category as $value) {
            if ($value == 'duoi-1-trieu') {
                $data->Where('product_price', '<', 1000);
            } elseif ($value == 'tu-1-5-trieu') {
                $data->WhereBetween('product_price', [1000, 5000]);
            } elseif ($value == 'tu-5-10-trieu') {
                $data->WhereBetween('product_price', [5000, 10000]);
            } elseif ($value == 'tu-10-15-trieu') {
                $data->WhereBetween('product_price', [10000, 15000]); // Chỉnh sửa khoảng giá này
            } elseif ($value == 'tren-15-trieu') {
                $data->Where('product_price', '>', 15000);
            }
            // Thêm các điều kiện khác ở đây tùy thuộc vào giá trị của $value
        }

        // Lấy dữ liệu
        $products = $data->get(); // Lưu ý, bạn cần gán kết quả vào biến $products

        // Trả về JSON
        response()->json($products);

        // Hoặc trả về view
        return view('fonts.products', compact('products'));
    }

}