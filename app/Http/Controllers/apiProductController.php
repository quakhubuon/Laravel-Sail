<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Product;

class apiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->product_status = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
            $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('FE/images', $new_image);
            $product->product_image = $new_image;
        } else {
            $product->product_image = '';
        }
        $product->save();
        return Redirect::to('admin/list_product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        return view('pages.edit_product')->with(['products' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $product = Product::find($id);

        $product->category_id = $data['category_id'];
        $product->product_name = $data['product_name'];
        $product->product_desc = $data['product_desc'];
        $product->product_price = $data['product_price'];
        $product->product_status = $data['product_status'];

        $get_image = $request->file('product_image');
        if($get_image){
            $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('FE/images', $new_image);
            $product->product_image = $new_image;
        } 
        $product->save();
        return Redirect::to('admin/list_product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('product_id', $id)->first();
        $product->delete();
        return Redirect::to('admin/list_product');
    }
}
