@extends('admin_welcome')
@section('admin_content')

<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

    $data = DB::table('tbl_category_product')->get();
    $message = Session::get('message');
    if($message) {
        echo '<script language="javascript">';
        echo 'alert("' . $message . '")';
        echo '</script>';
        Session::forget('message');
    }
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách sản phẩm</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Tên sản phẩm
                            </th>
                            <th>
                                Giá
                            </th>
                            <th>
                                Hình
                            </th>
                            <th>
                                Ghi chú
                            </th>
                            <th>
                                Danh mục
                            </th>
                            <th>
                                Tình trạng
                            </th>
                            <th class="text-right">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                {{ $product->product_name }}
                            </td>
                            <td>
                                {{ $product->product_price }} VNĐ
                            </td>
                            <td>
                                <img style="width: 100px;"
                                    src="{{ asset('FE/images/' . $product->product_image) }}">
                            </td>
                            <td>
                                {{ $product->product_desc }}
                            </td>

                            @foreach($data as $key)
                            @if ($product->category_id == $key->category_id)
                            <td>{{ $key->category_name }}</td>
                            @endif
                            @endforeach

                            <td>
                                @if($product->product_status == 1)
                                Hiện
                                @else
                                Ẩn
                                @endif
                            </td>
                            <td class=" text-right">
                                <a style="font-size: 1.5rem; margin-right: 8px; color: black;"
                                    href="{{ URL::to('/admin/edit_product/' . $product->product_id) }}"><i
                                        class=" nc-icon nc-tag-content"></i></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?');"
                                    style="font-size: 1.5rem; color: black;"
                                    href="{{ URL::to('/admin/list_product/' . $product->product_id) }}"><i
                                        class="nc-icon nc-basket"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection