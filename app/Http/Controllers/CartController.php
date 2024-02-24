<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function AddCart($id) {
        //Session::forget('cart');
        $product = DB::table('tbl_product')->where('product_id', $id)->first();
        $cart = Session::get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity']+1;
        } else {
            $cart[$id] = [
                'id' => $product->product_id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_image,
                'quantity' => 1
            ];
        }
        Session::put('cart', $cart);
        return view('pages.cart');
    }

    public function AddDetail(Request $request) {
        $product = DB::table('tbl_product')->where('product_id', $request->cat_id)->first();
        $cart = Session::get('cart');

        if(isset($cart[$request->cat_id])) {
            $cart[$request->cat_id]['quantity'] = $request->cat_quantity;
        } else {
            $cart[$request->cat_id] = [
                'id' => $product->product_id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_image,
                'quantity' => $request->cat_quantity
            ];
        }
        Session::put('cart', $cart);
        return view('pages.cart');
    }

    public function UpdateCart(Request $request) {
        $cart = Session::get('cart');
        if(($request->cart_quantity)<=0) {
            $cart[$request->cart_id]['quantity'] = 1;
        }else {
            $cart[$request->cart_id]['quantity'] = $request->cart_quantity;
        }
        Session::put('cart', $cart);
        return view('pages.cart');
    }

    public function DeleteCart($id) {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return view('pages.cart');
    }

    public function DeleteAll() {
        Session::forget('cart');
        return Redirect('home');
    }

    public function PlaceOrder(Request $request) {
        $cart = Session::get('cart');
        $user = Session::get('user');
        
        $user_id = $user->id;
        $total_price = $request->total_price;
        $order_phone = $request->order_phone;
        $order_address = $request->order_address;
        $order_payment = $request->order_payment;
        $order_status = 0;
        $created_at = date('Y-m-d H:i:s');
        $date_delivery = date('Y-m-d H:i:s', strtotime($created_at . ' +7 days'));

        $order = array();
        $order['user_id'] = $user_id;
        $order['total_price'] = $total_price;
        $order['order_phone'] = $order_phone;
        $order['order_address'] = $order_address;
        $order['order_payment'] = $order_payment;
        $order['order_status'] = $order_status;
        $order['created_at'] = $created_at;
        $order['date_delivery'] = $date_delivery;

        $id = DB::table('orders')->insertGetId($order);
        
        foreach($cart as $item) {
            $detail = array();
            $detail['detail_id'] = $id;
            $detail['product_id'] = $item['id'];
            $detail['price'] = $item['price'];
            $detail['quantity'] = $item['quantity'];

            $result = DB::table('detail')->insert($detail);
        }
        
        Session::forget('cart');
        return Redirect('/home');
    }

    public function history_checkout(Request $request) {
        $user_id = $request->user_id;
        $data = DB::table('orders')->where('user_id', $user_id)->get();
        return view('pages.checkout_history')->with(['orders' => $data]);
    }

    public function detail_checkout(Request $request) {
        $order_id = $request->order_id;
        $data = DB::table('detail')->where('detail_id', $order_id)->get();
        return view('pages.detail_checkout')->with(['orders' => $data]);
    }
    
    public function admin_checkout() {
        $data = DB::table('orders')->get();
        return view('pages.list_checkout')->with(['orders' => $data]);
    }

    public function admin_detail_checkout(Request $request) {
        $order_id = $request->order_id;
        $data = DB::table('detail')->where('detail_id', $order_id)->get();
        $data2 = DB::table('orders')->where('order_id', $order_id)->first();
        return view('pages.admin_detail_checkout')->with(['details' => $data])->with(['orders' => $data2]);
    }

    public function detail_checkout_update(Request $request) {
        $order_status = $request->order_status;
        $order_id = $request->order_id;

        DB::table('orders')->where('order_id', $order_id)->update(['order_status' => $order_status]);
        return Redirect('admin/list_checkout');
    }

    public function search_check_out(Request $request) {
        $date_delivery = $request->date_delivery;
        $data = DB::table('orders')->where('date_delivery', 'LIKE', '%'. $date_delivery .'%')->get();
        return view('pages.list_checkout')->with(['orders' => $data]);
    }
    
}