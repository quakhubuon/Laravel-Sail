@extends('admin_welcome')
@section('admin_content')

<?php

use Illuminate\Support\Facades\Session;

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
            <h4 class="card-title">Danh sách của danh mục sản phẩm</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Tên danh mục sản phẩm
                            </th>
                            <th>
                                Ghi chú
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
                        @foreach($categorys as $category)
                        <tr>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td>
                                {{ $category->category_desc }}
                            </td>
                            <td>
                                @if($category->category_status == 1)
                                Hiện
                                @else
                                Ẩn
                                @endif
                            </td>
                            <td class="text-right">
                                <a style="font-size: 1.5rem; margin-right: 8px; color: black;"
                                    href="{{ URL::to('/admin/edit_category/' . $category->category_id) }}"><i
                                        class=" nc-icon nc-tag-content"></i></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?');"
                                    style="font-size: 1.5rem; color: black;"
                                    href="{{ URL::to('/admin/list_category/' . $category->category_id) }}"><i
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